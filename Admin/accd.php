<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

if($op == 'default')
{
	$Where = " WHERE UserName='".$_REQUEST['username']."' and onTime between CURDATE()-interval 30 day";
	$pageURL = '?do='.$do.'&username='.$_REQUEST['username'].'&pn';

	$RetList = adminPage('web_online', $Where, $pn, $pageURL, 'uid', 10);
//var_dump($RetList);die;
	$tpl->assign('RetList', $RetList);
	unset($RetList, $pageURL);
	$tpl->display('acc_detail.htm');
}