<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$checkId = $db->get_row("SELECT `user`, `pass`, `lockuser`, `number`, `online` FROM web_user WHERE uid = '1'");
	$online = floor($checkId->online / 60);
	$tpl->assign('online', $online);
	$tpl->assign('checkId', $checkId);
	$tpl->display('test.htm');
}

elseif ($op == 'cmdsave')
{
	$sqlstr = "SELECT `uid` FROM web_user WHERE `user` = '{$user}' AND `uid` NOT IN (1)";
	$checkId = $db->get_var($sqlstr);
	if(!empty($checkId))
	{
		ShowMsg('fail', '该账号'.$user.'已经存在.');
	}
	$online = $online * 60;
	$dsql->query("UPDATE web_user SET `user` = '{$user}', `pass` = '{$pass}', `lockuser` = '{$lockuser}',
        `number` = '{$number}', `online` = '{$online}' WHERE uid = '1'");
	ShowMsg();
}