<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$tpl->display('Pass.htm');
}

elseif ($op == 'cmdsave')
{
	$ypass = md5($ypass);
	$sqlstr = "SELECT `pass` FROM web_admin WHERE uid = '{$_SESSION['authadmin_uid']}'";
	$checkId = $dsql->get_var($sqlstr);
	if($ypass != $checkId){
		ShowMsg('fail', '原密码输入错误,请重新提交! ');
	}
	if(!empty($pass))
	{
		if($pass != $repass)
		{
			ShowMsg('fail', '两次输入密码不同,请重新提交! ');
		}
		$password = md5($pass);
		$dsql->query("UPDATE web_admin SET `pass` = '{$password}' WHERE uid = '{$_SESSION['authadmin_uid']}'");
	}
	ShowMsg();
}