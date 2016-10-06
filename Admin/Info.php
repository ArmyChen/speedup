<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$checkId = $db->get_row("SELECT `realname`, `email`, `aliww`, `qq`, `profile` 
	    FROM web_admin WHERE uid = '{$_SESSION['authadmin_uid']}'");
	$tpl->assign('checkId', $checkId);
	$tpl->display('Info.htm');
}

elseif ($op == 'cmdsave')
{
	$dsql->query("UPDATE web_admin SET `realname` = '{$realname}', `email` = '{$email}', `aliww` = '{$aliww}',
        `qq` = '{$qq}', `profile` = '{$profile}' WHERE uid = '{$_SESSION['authadmin_uid']}'");
	ShowMsg();
}