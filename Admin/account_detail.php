<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$sqlstr = "SELECT uid, `name`, `acct` FROM web_group ORDER BY uid DESC";
$groupList = $dsql->get_results($sqlstr);

if($op == 'default')
{
	$Where = " WHERE user=".$_REQUEST['user'];
	$pageURL = '?do='.$do.'&user='.$_REQUEST['user'].'&pn';

	$RetList = adminPage('web_order', $Where, $pn, $pageURL, 'uid', 50);
	$tpl->registerPlugin("function","userGroup", "getUserGroupName");
	$tpl->registerPlugin("function","userType", "getUserGroupType");
	$tpl->registerPlugin("function","userAcct", "getuserAcct");
	$tpl->assign('RetList', $RetList);
	$tpl->assign('groupList', $groupList);
	unset($groupList, $RetList, $pageURL);
	$tpl->display('account_detail.htm');
}
