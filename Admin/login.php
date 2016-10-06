<?php

/**
* Example Application
*
* @package Example-application
*/

$savePath = "../Data/session";
session_save_path($savePath);
@ini_set('session.gc_probability', 1);
session_start();
if(!empty($_SESSION['authadmin_uid'])) {
	header("location: index.php");
	exit(0);
}
require '../Data/common.inc.php';
if($do == 'login') {
	if($_SESSION['authadmin_session'] != strtoupper($code)) {
		$tpl->assign('msg', '验证码输入错误, 请重新输入!');
		$tpl->display('msg.htm');
	}
	$password = md5($password);
	$checkId = $db->get_row("SELECT uid, `name`, `start` FROM web_admin WHERE `name` = '{$username}' AND `pass` = '{$password}' LIMIT 1");
	if(empty($checkId->uid)) {
		$tpl->assign('msg', '账号名称或密码错误!');
		$tpl->display('msg.htm');
	}
	if($checkId->start != 1) {
		$tpl->assign('msg', '该账号已锁定,请联系客服!');
		$tpl->display('msg.htm');
	}
    $dsql->query("UPDATE web_admin SET `loginTime` = NOW() WHERE uid = '{$checkId->uid}'");
	require 'common.func.php';
	require '../Apps/Browser.php';
	$browser = new Browser();
	$getAddress = getAddress();
	$getBrowser = $browser->getBrowser().' '.$browser->getVersion();
	$getPlatform = $browser->getPlatform();
	$db->query("INSERT INTO web_log (user, ip, addtime, `open`, `getBrowser`, `getPlatform`)
	    VALUES ( '{$checkId->uid}', '{$getAddress}', NOW(), '登入系统后台..', '{$getBrowser}', '{$getPlatform}')");
	$_SESSION['authadmin_uid']  = $checkId->uid;
	$_SESSION['authadmin_name'] = $checkId->name;
	$dsql->query("UPDATE web_admin SET `addtime` = NOW() WHERE uid = '{$checkId->uid}'");
	unset($browser, $getBrowser, $getPlatform, $getAddress, $password, $checkId);
	header("location: index.php");
}
$tpl->display('login.htm');
