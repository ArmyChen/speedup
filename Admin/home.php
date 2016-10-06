<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$info= $db->get_row("SELECT `ip`, `addtime` FROM web_log WHERE `user` = '{$_SESSION['authadmin_uid']}' AND `open` = '登出系统后台..' ORDER BY uid DESC LIMIT 1");
$home = array(
	"LoginUser"=>$_SESSION['authadmin_name'],
	"LoginTime"=>$info->addtime,
	"LoginIP"=>checkAddress($info->ip),
);

$tpl->assign('home', $home);
$tpl->display('home.htm');