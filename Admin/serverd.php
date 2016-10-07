<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

if($op == 'default')
{
	$Where = " WHERE serverIP='".$_REQUEST['serverIP']."' and onTime between CURDATE()-interval 30 day";
	$pageURL = '?do='.$do.'&serverIP='.$_REQUEST['serverIP'].'&pn';

	$RetList = adminPage('web_online', $Where, $pn, $pageURL, 'uid', 10);
//var_dump($_REQUEST['serverIP']);die;
	$tpl->assign('RetList', $RetList);
	unset($RetList, $pageURL);
	$tpl->display('server_detail.htm');
}