<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$pageURL = '?do='.$do.'&m='.$m.'&keyword='.$keyword.'&pn';
	if($m == 'search') {
		$Where = " WHERE INSTR(`serverGroupName`, '{$keyword}') ";
		$tpl->assign('keyword', $keyword);
	}
	$RetList = adminPage('web_serverGroup', $Where, $pn, $pageURL, 'uid');
	$tpl->assign('RetList', $RetList);
	unset($pageURL, $RetList);
	$tpl->display('serverGroup.htm');
}

elseif ($op == 'cmdsave')
{
	if(empty($uid))
	{
		$sqlstr = "SELECT uid FROM web_serverGroup WHERE `serverGroupName` = '{$serverGroupName}' LIMIT 1";
		$checkId = $db->get_var($sqlstr);
		unset($sqlstr);
		if(!empty($checkId))
		{
            ShowMsg('fail', '该分组已存在! ');
		}
		$db->query("INSERT INTO web_serverGroup (`serverGroupName`, `IpDnsAddress`, `IpDns2Address`, `start`, `addtime`)
		    VALUES ('{$serverGroupName}', '{$IpDnsAddress}', '{$IpDns2Address}', '{$start}', NOW())");
	}
	else
	{
		$dsql->query("UPDATE web_serverGroup SET `serverGroupName` = '{$serverGroupName}', `IpDnsAddress` = '{$IpDnsAddress}', `IpDns2Address` = '{$IpDns2Address}', `start` = '{$start}' WHERE uid = '{$uid}'");
	}
    ShowMsg();
}

elseif ($op == 'cmdEdit')
{
	if(!empty($uid))
	{
		$sqlstr = "SELECT `uid`, `serverGroupName`, `IpDnsAddress`, `IpDns2Address`, `start`, `addtime` FROM web_serverGroup WHERE uid = '{$uid}'";
		$checkId = $db->get_row($sqlstr);
		$tpl->assign('checkId', $checkId);
		unset($checkId);
	}
	$tpl->display('serverGroupedit.htm');
}

elseif ($op == 'cmdDel')
{
	if(!empty($uid))
	{
		$db->query("DELETE FROM web_serverGroup WHERE uid = '{$uid}'");
	}
	ShowMsg();
}