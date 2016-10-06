<?php

/**
 * Example Application
 *
 * @package Example-application
 */


global $Mysql_pdo_str;

$Mysql_pdo_str = array
(
	1 => 'Require $dsn and $user and $password to create a connection'
);

class Mysql_pdo extends Mysqlcore
{

	var $dsn;
	var $user;
	var $password;
	var $rows_affected = false;

	function __construct($dsn='', $user='', $password='', $ssl=array())
	{
		ini_set('track_errors',1);

		if ( $dsn && $user )
		{
			$this->connect($dsn, $user, $password);
		}
	}

	function connect($dsn='', $user='', $password='', $ssl = array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'))
	{
		global $Mysql_pdo_str; $return_val = false;

		if ( ! $dsn || ! $user )
		{
			$this->register_error($Mysql_pdo_str[1].' in '.__FILE__.' on line '.__LINE__);
			$this->show_errors ? trigger_error($Mysql_pdo_str[1],E_USER_WARNING) : null;
		}

		try
		{
			$this->dbh = new PDO($dsn, $user, $password, $ssl);

			$this->conn_queries = 0;

			$return_val = true;
		}
		catch (PDOException $e)
		{
			$this->register_error($e->getMessage());
			$this->show_errors ? trigger_error($e->getMessage(),E_USER_WARNING) : null;
		}

		return $return_val;
	}

	function quick_connect($dsn='', $user='', $password='', $ssl=array())
	{
		return $this->connect($dsn, $user, $password);
	}

	function select($dsn='', $user='', $password='', $ssl=array())
	{
		return $this->connect($dsn, $user, $password);
	}

	function escape($str)
	{
		switch (gettype($str))
		{
			case 'string' : $str = addslashes(stripslashes($str));
			break;
			case 'boolean' : $str = ($str === FALSE) ? 0 : 1;
			break;
			default : $str = ($str === NULL) ? 'NULL' : $str;
			break;
		}

		return $str;
	}

	function sysdate()
	{
		return "NOW()";
	}

	function catch_error()
	{
		$error_str = 'No error info';

		$err_array = $this->dbh->errorInfo();

		if ( isset($err_array[1]) && $err_array[1] != 25)
		{

			$error_str = '';
			foreach ( $err_array as $entry )
			{
				$error_str .= $entry . ', ';
			}

			$error_str = substr($error_str,0,-2);

			$this->register_error($error_str);
			$this->show_errors ? trigger_error($error_str.' '.$this->last_query,E_USER_WARNING) : null;

			return true;
		}

	}

	function query($query)
	{

		$query = str_replace("/[\n\r]/",'',trim($query));

		$return_val = 0;

		$this->flush();

		$this->func_call = "\$db->query(\"$query\")";

		$this->last_query = $query;

		$this->count(true, true);

		$this->timer_start($this->num_queries);

		if ( $cache = $this->get_cache($query) )
		{

			$this->timer_update_global($this->num_queries);

			if ( $this->use_trace_log )
			{
				$this->trace_log[] = $this->debug(false);
			}

			return $cache;
		}

		if ( ! isset($this->dbh) || ! $this->dbh )
		{
			$this->connect($this->dsn, $this->user, $this->password);
			if ( ! isset($this->dbh) || ! $this->dbh )
				return false;
		}

		if ( preg_match("/^(insert|delete|update|replace|drop|create)\s+/i",$query) )
		{

			$this->rows_affected = $this->dbh->exec($query);

			if ( $this->catch_error() ) return false;

			$is_insert = true;

			if ( preg_match("/^(insert|replace)\s+/i",$query) )
			{
				$this->insert_id = @$this->dbh->lastInsertId();
			}

			$return_val = $this->rows_affected;

		}

		else
		{

			$sth = $this->dbh->query($query);

			if ( $this->catch_error() ) return false;

			$is_insert = false;

			$col_count = $sth->columnCount();

			for ( $i=0 ; $i < $col_count ; $i++ )
			{
				$this->col_info[$i] = new stdClass();

				if ( $meta = $sth->getColumnMeta($i) )
				{
					$this->col_info[$i]->name =  $meta['name'];
					$this->col_info[$i]->type =  !empty($meta['native_type']) ? $meta['native_type'] : 'undefined';
					$this->col_info[$i]->max_length =  '';
				}
				else
				{
					$this->col_info[$i]->name =  'undefined';
					$this->col_info[$i]->type =  'undefined';
					$this->col_info[$i]->max_length = '';
				}
			}

			$num_rows=0;
			while ( $row = @$sth->fetch(PDO::FETCH_ASSOC) )
			{
				$this->last_result[$num_rows] = (object) $row;
				$num_rows++;
			}

			$this->num_rows = $num_rows;

			$return_val = $this->num_rows;

		}

		$this->store_cache($query,$is_insert);

		$this->trace || $this->debug_all ? $this->debug() : null ;

		$this->timer_update_global($this->num_queries);

		if ( $this->use_trace_log )
		{
			$this->trace_log[] = $this->debug(false);
		}

		return $return_val;

	}

}
