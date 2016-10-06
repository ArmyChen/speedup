<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'cmdsave')
{
	$dsql->query("UPDATE web_regist SET `opMail` = '{$opMail}', `opTitle` = '{$opTitle}', `opContent` = '{$opContent}' WHERE uid = '1'");
	ShowMsg();
}

else
{
	$checkId = $db->get_row("SELECT `opMail`, `opTitle`, `opContent` FROM web_regist WHERE uid = '1'");
	$tpl->assign('checkId', $checkId);
	unset($checkId);
	$tpl->display('openuser.htm');
}