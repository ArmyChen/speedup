<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$RetList = $dsql->get_results("SHOW TABLE STATUS");
	$tpl->assign('RetList', $RetList);
	unset($RetList);
	$tpl->display('backup.htm');
}

elseif($op == 'repair')
{
	foreach ($tabledb as $tablename) {
		$dsql->query("REPAIR TABLE `$tablename`");
	}
    ShowMsg();
}

elseif($op == 'optimize')
{
	foreach ($tabledb as $tablename) {
		$dsql->query("OPTIMIZE TABLE `$tablename`");
	}
	ShowMsg();
}

elseif($op == 'backup')
{
	ShowMsg('fail', '备份请先关闭认证及网站注册! ');
}
 