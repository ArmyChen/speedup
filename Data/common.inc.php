<?php

/**
 * Example Application
 *
 * @package Example-application
 */

error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
header('X-Powered-By: FXP/1.6.4.3');
@ini_set('memory_limit',       '128M');
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid',   0);
@ini_set('session.use_cookies',     1);
@ini_set('session.auto_start',      0);
@ini_set('session.cookie_lifetime', 0);
if (function_exists('ob_gzhandler')) {
	ob_start('ob_gzhandler');
} else {
	ob_start();
}

$dsql = $db = $tpl = $Where = $keyword = $m = $uid = Null;

$_formarray = Array('_GET', '_POST');
foreach($_formarray as $_request) {
	foreach($$_request as $_key => $_value) {
		${$_key} = daddslashes($_value);
	}
}

$pn = empty($pn) ? '1' : $pn;
$do = empty($do) ? 'default' : $do;
$op = empty($op) ? 'default' : $op;

LoadTemplate();

function LoadTemplate() {
	global $tpl;
	require '../Apps/Smarty.class.php';
	$tpl = new Smarty();
	$tpl->left_delimiter = '<!--{';
	$tpl->right_delimiter = '}-->';
	$tpl->template_dir = 'theme';
	$tpl->compile_dir = '../Data/cache';
	$tpl->cache_dir = '../Data/cache';
}

dbconnect();

function dbconnect() {
	global $dsql, $db;
	require '../config.php';
	require '../Apps/mysql_core.php';
	require '../Apps/mysql_pdo.php';
	$dsql = $db = new Mysql_pdo('mysql:host='.$dns['Host'].';dbname='.$dns['Name'], $dns['UserName'], $dns['PassWord']);
}

function daddslashes($string, $force = 0) {
	$get_magic_gpc = @get_magic_quotes_gpc();
	if(!$get_magic_gpc || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}

// 数据大小尺寸计算
function formatSizeUnits($bytes)
{
	if ($bytes >= 1.23794003928538e+27) {
	$bytes = number_format($bytes / 1.23794003928538e+27, 2) . ' BB';
	} elseif ($bytes >= 1.208925819614629e+24) {
	$bytes = number_format($bytes / 1.208925819614629e+24, 2) . ' YB';
	} elseif ($bytes >= 1.180591620717411e+21) {
	$bytes = number_format($bytes / 1.180591620717411e+21, 2) . ' ZB';
	} elseif ($bytes >= 1.152921504606847e+18) {
	$bytes = number_format($bytes / 1.152921504606847e+18, 2) . ' EB';
	} elseif ($bytes >= 1125899906842624) {
	$bytes = number_format($bytes / 1125899906842624, 2) . ' PB';
	} elseif ($bytes >= 1099511627776) {
	$bytes = number_format($bytes / 1099511627776, 2) . ' TB';
	} elseif ($bytes >= 1073741824) {
	$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
	$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
	$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
	$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
	$bytes = $bytes . ' byte';
	} else {
	  $bytes = '0 bytes';
	}
	return $bytes;
}

function formatGSizeUnits($bytes)
{
	$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	return $bytes;
}

// 获取用户真实地址
function getAddress() {
	$ip = false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) {
			array_unshift($ips, $ip); $ip = FALSE;
		}
		for ($i = 0; $i < count($ips); $i++)  {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}