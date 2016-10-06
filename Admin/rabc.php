<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$Where = " WHERE uid != 1";
	$pageURL = '?do='.$do.'&m='.$m.'&keyword='.$keyword.'&pn';
	if($m == 'search') {
		$Where .= " AND INSTR(`name`, '{$keyword}') ";
		$tpl->assign('keyword', $keyword);
	}
	$RetList = adminPage('web_admin', $Where, $pn, $pageURL, 'uid');
	$tpl->assign('RetList', $RetList);
	$tpl->display('rabc.htm');
}

elseif ($op == 'cmdsave')
{
	if($pass != $repass)
	{
		ShowMsg('fail', '两次输入密码不同,请重新提交! ');
	}
	if(empty($uid))
	{
		$sqlstr = "SELECT uid FROM web_admin WHERE `name` = '{$name}' LIMIT 1";
		$checkId = $db->get_var($sqlstr);
		if(!empty($checkId))
		{
            ShowMsg('fail', '新增账号已存在! ');
		}
		$password = md5($pass);
		$db->query("INSERT INTO web_admin (`name`, `pass`, `loginTime`, `start`, `realname`, `email`, `aliww`, `qq`, `profile`)
		    VALUES ('{$name}', '{$password}', '2000-00-00 00:00:00', '{$start}', '{$realname}', '{$email}', '{$aliww}', '{$qq}', '{$profile}')");
	}
	else
	{
		if(!empty($pass))
		{
            $password = md5($pass);
			$dsql->query("UPDATE web_admin SET `pass` = '{$password}' WHERE uid = '{$uid}' AND uid != 1");
		}
		$dsql->query("UPDATE web_admin SET `start` = '{$start}', `realname` = '{$realname}', `email` = '{$email}',
		    `aliww` = '{$aliww}', `qq` = '{$qq}', `profile` = '{$profile}' WHERE uid = '{$uid}' AND uid != 1");
	}
    ShowMsg();
}

elseif ($op == 'cmdEdit')
{
	if(!empty($uid) && $uid != 1)
	{
		$sqlstr = "SELECT `uid`, `name`, `loginTime`, `start`, `realname`, `email`, `aliww`, `qq`, `profile` FROM web_admin WHERE uid = '{$uid}'";
		$checkId = $db->get_row($sqlstr);
		$tpl->assign('checkId', $checkId);
	}
	$tpl->display('rabcedit.htm');
}

elseif ($op == 'cmdDel')
{
	if(!empty($uid) && $uid != 1)
	{
		$db->query("DELETE FROM web_admin WHERE uid = '{$uid}'");
	}
	ShowMsg();
}