<?php

/**
 * Example Application
 *
 * @package Example-application
 */

define('Mysql_VERSION', '2.17');
define('OBJECT', 'OBJECT');
define('ARRAY_A', 'ARRAY_A');
define('ARRAY_N', 'ARRAY_N');

class Mysqlcore
{
	var $trace            = false;
	var $debug_all        = false;
	var $debug_called     = false;
	var $vardump_called   = false;
	var $show_errors      = true;
	var $num_queries      = 0;
	var $conn_queries     = 0;
	var $last_query       = null;
	var $last_error       = null;
	var $col_info         = null;
	var $captured_errors  = array();
	var $cache_dir        = false;
	var $cache_queries    = false;
	var $cache_inserts    = false;
	var $use_disk_cache   = false;
	var $cache_timeout    = 24;
	var $timers           = array();
	var $total_query_time = 0;
	var $db_connect_time  = 0;
	var $trace_log        = array();
	var $use_trace_log    = false;
	var $sql_log_file     = false;
	var $do_profile       = false;
	var $profile_times    = array();

	var $debug_echo_is_on = true;

	function __construct()
	{
	}

	function get_host_port( $host, $default = false )
	{
		$port = $default;
		if ( false !== strpos( $host, ':' ) ) {
			list( $host, $port ) = explode( ':', $host );
			$port = (int) $port;
		}
		return array( $host, $port );
	}

	function register_error($err_str)
	{
		$this->last_error = $err_str;
		$this->captured_errors[] = array
		(
			'error_str' => $err_str,
			'query'     => $this->last_query
		);
	}

	function show_errors()
	{
		$this->show_errors = true;
	}

	function hide_errors()
	{
		$this->show_errors = false;
	}

	function flush()
	{
		$this->last_result = null;
		$this->col_info = null;
		$this->last_query = null;
		$this->from_disk_cache = false;
	}

	function get_var($query=null,$x=0,$y=0)
	{
		$this->func_call = "\$db->get_var(\"$query\",$x,$y)";
		if ( $query )
		{
			$this->query($query);
		}
		if ( $this->last_result[$y] )
		{
			$values = array_values(get_object_vars($this->last_result[$y]));
		}
		return (isset($values[$x]) && $values[$x]!=='')?$values[$x]:null;
	}

	function get_row($query=null,$output=OBJECT,$y=0)
	{
		$this->func_call = "\$db->get_row(\"$query\",$output,$y)";
		if ( $query )
		{
			$this->query($query);
		}
		if ( $output == OBJECT )
		{
			return $this->last_result[$y]?$this->last_result[$y]:null;
		}
		elseif ( $output == ARRAY_A )
		{
			return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
		}
		elseif ( $output == ARRAY_N )
		{
			return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
		}
		else
		{
			$this->show_errors ? trigger_error(" \$db->get_row(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N",E_USER_WARNING) : null;
		}

	}

	function get_col($query=null,$x=0)
	{
		$new_array = array();
		if ( $query )
		{
			$this->query($query);
		}
		$j = count($this->last_result);
		for ( $i=0; $i < $j; $i++ )
		{
			$new_array[$i] = $this->get_var(null,$x,$i);
		}
		return $new_array;
	}

	function get_results($query=null, $output = OBJECT)
	{
		$this->func_call = "\$db->get_results(\"$query\", $output)";
		if ( $query )
		{
			$this->query($query);
		}
		if ( $output == OBJECT )
		{
			return $this->last_result;
		}
		elseif ( $output == ARRAY_A || $output == ARRAY_N )
		{
			if ( $this->last_result )
			{
				$i=0;
				foreach( $this->last_result as $row )
				{
					$new_array[$i] = get_object_vars($row);
					if ( $output == ARRAY_N )
					{
						$new_array[$i] = array_values($new_array[$i]);
					}
					$i++;
				}
				return $new_array;
			}
			else
			{
				return array();
			}
		}
	}

	function get_col_info($info_type="name",$col_offset=-1)
	{
		if ( $this->col_info )
		{
			if ( $col_offset == -1 )
			{
				$i=0;
				foreach($this->col_info as $col )
				{
					$new_array[$i] = $col->{$info_type};
					$i++;
				}
				return $new_array;
			}
			else
			{
				return $this->col_info[$col_offset]->{$info_type};
			}

		}

	}

	function store_cache($query,$is_insert)
	{
		$cache_file = $this->cache_dir.'/'.md5($query);
		if ( $this->use_disk_cache && ( $this->cache_queries && ! $is_insert ) || ( $this->cache_inserts && $is_insert ))
		{
			if ( ! is_dir($this->cache_dir) )
			{
				$this->register_error("Could not open cache dir: $this->cache_dir");
				$this->show_errors ? trigger_error("Could not open cache dir: $this->cache_dir",E_USER_WARNING) : null;
			}
			else
			{
				$result_cache = array
				(
					'col_info' => $this->col_info,
					'last_result' => $this->last_result,
					'num_rows' => $this->num_rows,
					'return_value' => $this->num_rows,
				);
				file_put_contents($cache_file, serialize($result_cache));
				if( file_exists($cache_file . ".updating") )
					unlink($cache_file . ".updating");
			}
		}

	}

	function get_cache($query)
	{
		$cache_file = $this->cache_dir.'/'.md5($query);
		if ( $this->use_disk_cache && file_exists($cache_file) )
		{
			if ( (time() - filemtime($cache_file)) > ($this->cache_timeout*3600) &&
				!(file_exists($cache_file . ".updating") && (time() - filemtime($cache_file . ".updating") < 60)) )
			{
				touch($cache_file . ".updating");
			}
			else
			{
				$result_cache = unserialize(file_get_contents($cache_file));
				$this->col_info = $result_cache['col_info'];
				$this->last_result = $result_cache['last_result'];
				$this->num_rows = $result_cache['num_rows'];
				$this->from_disk_cache = true;
				$this->trace || $this->debug_all ? $this->debug() : null ;
				return $result_cache['return_value'];
			}
		}

	}

	function vardump($mixed='')
	{
		ob_start();
		echo "<p><table><tr><td bgcolor=ffffff><blockquote><font color=000090>";
		echo "<pre><font face=arial>";
		if ( ! $this->vardump_called )
		{
			echo "<font color=800080><b>Mysql</b> (v".Mysql_VERSION.") <b>Variable Dump..</b></font>\n\n";
		}
		$var_type = gettype ($mixed);
		print_r(($mixed?$mixed:"<font color=red>No Value / False</font>"));
		echo "\n\n<b>Type:</b> " . ucfirst($var_type) . "\n";
		echo "<b>Last Query</b> [$this->num_queries]<b>:</b> ".($this->last_query?$this->last_query:"NULL")."\n";
		echo "<b>Last Function Call:</b> " . ($this->func_call?$this->func_call:"None")."\n";
		echo "<b>Last Rows Returned:</b> ".count($this->last_result)."\n";
		echo "</font></pre></font></blockquote></td></tr></table>".$this->donation();
		echo "\n<hr size=1 noshade color=dddddd>";
		$html = ob_get_contents();
		ob_end_clean();
		if ( $this->debug_echo_is_on )
		{
			echo $html;
		}
		$this->vardump_called = true;
		return $html;
	}

	function dumpvar($mixed)
	{
		$this->vardump($mixed);
	}

	function debug($print_to_screen=true)
	{
		ob_start();
		echo "<blockquote>";
		if ( ! $this->debug_called )
		{
			echo "<font color=800080 face=arial size=2><b>Mysql</b> (v".Mysql_VERSION.") <b>Debug..</b></font><p>\n";
		}
		if ( $this->last_error )
		{
			echo "<font face=arial size=2 color=000099><b>Last Error --</b> [<font color=000000><b>$this->last_error</b></font>]<p>";
		}
		if ( $this->from_disk_cache )
		{
			echo "<font face=arial size=2 color=000099><b>Results retrieved from disk cache</b></font><p>";
		}
		echo "<font face=arial size=2 color=000099><b>Query</b> [$this->num_queries] <b>--</b> ";
		echo "[<font color=000000><b>$this->last_query</b></font>]</font><p>";
		echo "<font face=arial size=2 color=000099><b>Query Result..</b></font>";
		echo "<blockquote>";
		if ( $this->col_info )
		{
			echo "<table cellpadding=5 cellspacing=1 bgcolor=555555>";
			echo "<tr bgcolor=eeeeee><td nowrap valign=bottom><font color=555599 face=arial size=2><b>(row)</b></font></td>";
			for ( $i=0, $j=count($this->col_info); $i < $j; $i++ )
			{
				echo "<td nowrap align=left valign=top><font size=1 color=555599 face=arial>{$this->col_info[$i]->type}";
				if (!isset($this->col_info[$i]->max_length))
				{
					echo "{$this->col_info[$i]->size}";
				} else {
					echo "{$this->col_info[$i]->max_length}";
				}
				echo "</font><br><span style='font-family: arial; font-size: 10pt; font-weight: bold;'>{$this->col_info[$i]->name}</span></td>";
			}
			echo "</tr>";
		if ( $this->last_result )
		{
			$i=0;
			foreach ( $this->get_results(null,ARRAY_N) as $one_row )
			{
				$i++;
				echo "<tr bgcolor=ffffff><td bgcolor=eeeeee nowrap align=middle><font size=2 color=555599 face=arial>$i</font></td>";
				foreach ( $one_row as $item )
				{
					echo "<td nowrap><font face=arial size=2>$item</font></td>";
				}
				echo "</tr>";
			}

		}
		else
		{
			echo "<tr bgcolor=ffffff><td colspan=".(count($this->col_info)+1)."><font face=arial size=2>No Results</font></td></tr>";
		}
		echo "</table>";
		}
		else
		{
			echo "<font face=arial size=2>No Results</font>";
		}
		echo "</blockquote></blockquote>".$this->donation()."<hr noshade color=dddddd size=1>";
		$html = ob_get_contents();
		ob_end_clean();
		if ( $this->debug_echo_is_on && $print_to_screen)
		{
			echo $html;
		}
		$this->debug_called = true;
		return $html;
	}

	function donation()
	{
		return "<font size=1 face=arial color=000000>If Mysql has helped! </font>";
	}

	function timer_get_cur()
	{
		list($usec, $sec) = explode(" ",microtime());
		return ((float)$usec + (float)$sec);
	}

	function timer_start($timer_name)
	{
		$this->timers[$timer_name] = $this->timer_get_cur();
	}

	function timer_elapsed($timer_name)
	{
		return round($this->timer_get_cur() - $this->timers[$timer_name],2);
	}

	function timer_update_global($timer_name)
	{
		if ( $this->do_profile )
		{
			$this->profile_times[] = array
			(
				'query' => $this->last_query,
				'time' => $this->timer_elapsed($timer_name)
			);
		}
		$this->total_query_time += $this->timer_elapsed($timer_name);
	}

	function get_set($params)
	{
		if( !is_array( $params ) )
		{
			$this->register_error( 'get_set() parameter invalid. Expected array in '.__FILE__.' on line '.__LINE__);
			return;
		}
		$sql = array();
		foreach ( $params as $field => $val )
		{
			if ( $val === 'true' || $val === true )
				$val = 1;
			if ( $val === 'false' || $val === false )
				$val = 0;

			switch( $val ){
				case 'NOW()' :
				case 'NULL' :
				  $sql[] = "$field = $val";
					break;
				default :
					$sql[] = "$field = '".$this->escape( $val )."'";
			}
		}

		return implode( ', ' , $sql );
	}

	function count ($all = true, $increase = false) {
		if ($increase) {
			$this->num_queries++;
			$this->conn_queries++;
		}

		return ($all) ? $this->num_queries : $this->conn_queries;
	}
}
