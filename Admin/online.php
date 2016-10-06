<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

if($op == 'default')
{
	$Where = " WHERE offTime = 1 ";
	$pageURL = '?do='.$do.'&m='.$m.'&UserName='.$UserName.'&serverIP='.$serverIP.'&pn';
	if($m == 'search') {
		if(!empty($UserName)) {
			$Where .= " AND INSTR(`UserName`, '{$UserName}') ";
			$tpl->assign('UserName', $UserName);
			unset($UserName);
		}
		if(!empty($serverIP)) {
			$Where .= " AND INSTR(`serverIP`, '{$serverIP}') ";
			$tpl->assign('serverIP', $serverIP);
			unset($serverIP);
		}
	}
	$RetList = adminPage('web_online', $Where, $pn, $pageURL, 'uid', 50);
	$tpl->registerPlugin("function","formatSize", "getSizeUnits");
	$tpl->assign('RetList', $RetList);
	unset($RetList);
	$tpl->display('online.htm');
}

elseif ($op == 'cmddelLick')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$sqlstr = "SELECT `UserName` FROM web_online WHERE `uid` = '{$tid}'";
		$checkId = $dsql->get_var($sqlstr);
		if(!empty($checkId)) {
			$dsql->query("UPDATE web_user SET `online` = `online` - 1 WHERE `user` = '{$checkId}'");
		}
		$dsql->query("UPDATE web_online SET `offTime` = 0 WHERE `uid` = '{$tid}'");
		$keyword++;
	}
	ShowMsg($keyword);
}