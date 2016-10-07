<?php

/**
 * Example Application
 *
 * @package Example-application
 */

define('IN_RAD', TRUE);
$savePath = "../Data/session";
session_save_path($savePath);
@ini_set('session.gc_probability', 1);
session_start();
if(empty($_SESSION['authadmin_uid'])) {
	header("location: login.php");
	exit(0);
}

require '../Data/common.inc.php';
require 'common.func.php';

$behavior = array('default', 'home', 'logout', 'cache', 'site', 'regist', 'openuser', 'email', 'rabc',
	'log', 'group', 'user', 'test', 'cardType', 'crad', 'cardView', 'serverGroup', 'server',
	'online', 'sales', 'backup', 'internet', 'order', 'Info', 'Pass','account','account_detail','accd','serverFlow','serverd');

if(in_array($do, $behavior)) {
	require $do.".php";
} else {
	ShowMsg(Null, 'Module not found!');
}