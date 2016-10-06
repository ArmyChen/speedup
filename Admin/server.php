<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$getGroupList = getGroupList();
$tpl->assign('GroupList', $getGroupList);
unset($getGroupList);

if($op == 'default')
{
	$Where = " WHERE uid =  uid ";
	$pageURL = '?do='.$do.'&m='.$m.'&serverName='.$serverName.'&serverIP='.$serverIP.'&groups='.$groups.
	'&start='.$start.'&Radius='.$Radius.'&Profile='.$Profile.'&Online='.$Online.'&pn';
	if($m == 'search') {
		if(!empty($serverName)) {
			$Where .= " && INSTR(`serverName`, '{$serverName}') ";
			$tpl->assign('serverName', $serverName);
			unset($serverName);
		}
		if(!empty($serverIP)) {
			$Where .= " && INSTR(`serverIP`, '{$serverIP}') ";
			$tpl->assign('serverIP', $serverIP);
			unset($serverIP);
		}
		if(!empty($groups)) {
			$Where .= " && `groups` = '{$groups}' ";
			$tpl->assign('groups', $groups);
			unset($groups);
		}
		if(!empty($start)) {
			$Where .= " && `start` = '{$start}' ";
			$tpl->assign('start', $start);
			unset($start);
		}
		if(!empty($Radius)) {
			$Where .= " && `Radius` = '{$Radius}' ";
			$tpl->assign('Radius', $Radius);
			unset($Radius);
		}
		if(!empty($Profile)) {
			$Where .= " && INSTR(`Profile`, '{$Profile}') ";
			$tpl->assign('Profile', $Profile);
			unset($Profile);
		}
		if(!empty($Online)) {
			$isline = $Online == 1 ? "!=" : '=';
			$Where .= " && `Online` $isline 0 ";
			$tpl->assign('Online', $Online);
			unset($isline);
		}
		if(!empty($isdns)) {
			$Where .= " && `dns` = '{$isdns}' ";
			$tpl->assign('isdns', $isdns);
			unset($isline);
		}
	}
	$tpl->registerPlugin("function","gidName", "getGroupName");
	$RetList = adminPage('web_server', $Where, $pn, $pageURL, 'Pos DESC, uid ', 50);
	$tpl->assign('RetList', $RetList);
	$tpl->display('server.htm');
}

elseif ($op == 'serverImport')
{
	if($m == 'cmdsave')
	{
		$marr = explode("\n",$arrData);
		$keyword = 0;
		foreach($marr as $list) {
			$nowarr = explode(",", $list);
			if(count($nowarr) == 3) {
				$serverName = trim($nowarr[0]);
				$serverIP = trim($nowarr[1]);
				$MaxOnline = trim($nowarr[2]);
				$db->query("INSERT INTO web_server (`serverName`, `serverIP`, `MaxOnline`, `groups`, `start`, `Radius`, `ShareUser`, `SharePass`, `ShareKey`, `SharePort`)
					VALUES ('{$serverName}', '{$serverIP}', '{$MaxOnline}', '{$groups}', '{$start}', '{$Radius}', '{$ShareUser}', '{$SharePass}', '{$ShareKey}', '{$SharePort}')");
				$keyword++;
			}
		}
		unset($marr, $nowarr);
		ShowMsg('success', '成功导入'.$keyword.'个服务器!');
	}
	$tpl->display('serverImport.htm');
}

elseif ($op == 'cmdsave')
{
	$dns = empty($isdns) ? "2" : '1';
	if(empty($uid))
	{
		$db->query("INSERT INTO web_server (`serverName`, `serverIP`, `dns`, `groups`, `MaxOnline`, `Pos`, `start`, `Radius`, `Level`, `ShareUser`, `SharePass`, `ShareKey`, `SharePort`, `Profile`)
		    VALUES ('{$serverName}', '{$serverIP}', '{$dns}', '{$groups}', '{$MaxOnline}', '{$Pos}', '{$start}', '{$Radius}', '{$Level}', '{$ShareUser}', '{$SharePass}', '{$ShareKey}', '{$SharePort}', '{$Profile}')");
	}
	else
	{
		$dsql->query("UPDATE web_server SET `serverName` = '{$serverName}', `serverIP` = '{$serverIP}', `dns` = '{$dns}', `groups` = '{$groups}', `MaxOnline` = '{$MaxOnline}', `Pos` = '{$Pos}', `start` = '{$start}',
		    `Radius` = '{$Radius}', `Level` = '{$Level}', `ShareUser` = '{$ShareUser}', `SharePass` = '{$SharePass}', `ShareKey` = '{$ShareKey}', `SharePort` = '{$SharePort}', `Profile` = '{$Profile}' WHERE uid = '{$uid}'");
	}
    ShowMsg();
}

elseif ($op == 'cmdEdit')
{
	if(!empty($uid))
	{
		$sqlstr = "SELECT `uid`, `serverName`, `serverIP`, `dns`, `groups`, `MaxOnline`, `Online`, `Pos`, `start`, `Radius`, `Level`, `ShareUser`,
        	`SharePass`, `ShareKey`, `SharePort`, `Profile` FROM web_server WHERE uid = '{$uid}'";
		$checkId = $db->get_row($sqlstr);
		$tpl->assign('checkId', $checkId);
	}
	$tpl->display('serveredit.htm');
}

elseif ($op == 'cmdDel')
{
	if(!empty($uid))
	{
		$db->query("DELETE FROM web_server WHERE uid = '{$uid}'");
	}
	ShowMsg();
}

elseif ($op == 'doBatchDelete')
{
	foreach ($aid as $tid) {
		$db->query("DELETE FROM web_server WHERE uid = '{$tid}'");
	}
	ShowMsg();
}

elseif ($op == 'doCopy')
{
	foreach ($aid as $tid) {
		$db->query("INSERT INTO web_server ( `serverName`, `serverIP`, `groups`, `MaxOnline`, `Pos`, `start`, `Radius`, `Level`, `ShareUser`, `SharePass`, `ShareKey`, `SharePort`, `Profile` )
		    SELECT `serverName`, `serverIP`, `groups`, `MaxOnline`, `Pos`, `start`, `Radius`, `Level`, `ShareUser`, `SharePass`, `ShareKey`, `SharePort`, `Profile` FROM web_server WHERE uid = '{$tid}'");
	}
	ShowMsg();
}

elseif ($op == 'doUPData')
{
	$keyword = null;
	if(!empty($groups)) {
		$keyword .= "`groups` = '{$groups}',";
	}

	if(!empty($Radius)) {
		$keyword .= "`Radius` = '{$Radius}',";
	}

	if(!empty($start)) {
		$keyword .= "`start` = '{$start}',";
	}

	if(!empty($Level)) {
		$keyword .= "`Level` = '{$Level}',";
	}

	if(!empty($Pos)) {
		$keyword .= "`Pos` = '{$Pos}',";
	}

	if(!empty($serverIP)) {
		$keyword .= "`serverIP` = '{$serverIP}',";
	}

	if(!empty($ShareUser)) {
		$keyword .= "`ShareUser` = '{$ShareUser}',";
	}

	if(!empty($SharePass)) {
		$keyword .= "`SharePass` = '{$SharePass}',";
	}

	if(!empty($ShareKey)) {
		$keyword .= "`ShareKey` = '{$ShareKey}',";
	}
	$keyword = substr($keyword, 0, -1);
    if(!empty($keyword) && count($aid) != 0)  {
		foreach ($aid as $tid) {
		    $dsql->query("UPDATE web_server SET $keyword WHERE uid = '{$tid}'");
		}
	}
	ShowMsg();
}