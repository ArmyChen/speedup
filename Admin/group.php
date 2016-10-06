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
		$Where = " WHERE INSTR(`name`, '{$keyword}') ";
		$tpl->assign('keyword', $keyword);
	}
	$RetList = adminPage('web_group', $Where, $pn, $pageURL, 'uid');
	$tpl->assign('RetList', $RetList);
	$tpl->registerPlugin("function","formatSize", "getSizeUnits");
	unset($RetList, $pageURL);
	$tpl->display('group.htm');
}

else if ($op == 'cmdsave')
{
	if ($dflow > $mflow) {
		ShowMsg('fail', '日流量限制不能大于月流量限制');
	}
	$muplink = $uplink * 1024;
	$mdownlink = $downlink * 1024;
	$mdflow = $dflow * 1048576;
	$mmflow = $mflow * 1048576;
	$server = @implode(',', $serverid);
	if(empty($uid))
	{
		$db->query("INSERT INTO web_group (`name`, `acct`, `uplink`, `downlink`, `dflow`, `mflow`, `serverid`)
		    VALUES ('{$name}', '{$acct}', '{$muplink}', '{$mdownlink}', '{$mdflow}', '{$mmflow}', '{$server}')");
	}
	else
	{
		$dsql->query("UPDATE web_group SET `name` = '{$name}', `acct` = '{$acct}', `uplink` = '{$muplink}', `downlink` = '{$mdownlink}',
		    `dflow` = '{$mdflow}', `mflow` = '{$mmflow}', `serverid` = '{$server}' WHERE uid = '{$uid}'");
	}
    ShowMsg();
}

elseif ($op == 'cmdEdit')
{
	$serverList = $Results = array();
	$groupList = getGroupList ();
	foreach ($groupList as $List ) {
		$Results = $dsql->get_results("SELECT uid, serverName FROM web_server WHERE groups = '{$List->uid}' ORDER BY Pos DESC, uid DESC");
		$serverList[$List->uid] = $Results;
		foreach ($Results as $Row ) {
			$keyword++;
		}
	}
	if(!empty($uid))
	{
		$sqlstr = "SELECT `uid`, `name`, `acct`, `uplink`, `downlink`, `dflow`, `mflow`, `serverid` FROM web_group WHERE uid = '{$uid}'";
		$checkId = $db->get_row($sqlstr);
		$dataList = explode(',', $checkId->serverid);
		$format_uplink = @ceil($checkId->uplink / 1024);
		$format_downlink = @ceil($checkId->downlink / 1024);
		$format_dflow = @ceil($checkId->dflow / 1048576);
		$format_mflow = @ceil($checkId->mflow / 1048576);
		$tpl->assign('checkId', $checkId);
		$tpl->assign('keyword', $keyword);
		$tpl->assign('dataList', $dataList);
		$tpl->assign('format_uplink', $format_uplink);
		$tpl->assign('format_downlink', $format_downlink);
		$tpl->assign('format_dflow', $format_dflow);
		$tpl->assign('format_mflow', $format_mflow);
		unset($sqlstr, $keyword, $dataList, $checkId, $format_uplink, $format_downlink, $format_dflow, $format_mflow);
	}
	$tpl->assign('groupList', $groupList);
	$tpl->assign('serverList', $serverList);
	unset($groupList, $serverList, $Results, $keyword);
	$tpl->display('groupedit.htm');
}

elseif ($op == 'cmdDel')
{
	if(!empty($uid))
	{
		$db->query("DELETE FROM web_group WHERE uid = '{$uid}'");
	}
	ShowMsg();
}