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
		$Where = " WHERE INSTR(`parameter`, '{$keyword}') ";
		$tpl->assign('keyword', $keyword);
	}
	$RetList = adminPage('web_site', $Where, $pn, $pageURL, 'uid');
	$tpl->assign('RetList', $RetList);
	unset($RetList, $RetList);
	$tpl->display('site.htm');
}

else if ($op == 'cmdsave')
{
	if(empty($uid))
	{
		$checkId = $db->get_var("SELECT uid FROM web_site WHERE `parameter` = '{$parameter}' AND `type` = '{$type}' LIMIT 1");
		if(!empty($checkId))
		{
            ShowMsg('fail', '该参数已存在添加失败!');
		}
		unset($checkId);
		$db->query("INSERT INTO web_site (`parameter`, `type`, `value`, `start`)
		    VALUES ('{$parameter}', '{$type}', '{$value}', '{$start}')");
	}
	else
	{
		$dsql->query("UPDATE web_site SET `type` = '{$type}', `value` = '{$value}', `start` = '{$start}' WHERE uid = '{$uid}'");
	}
    ShowMsg();
}

elseif ($op == 'cmdEdit')
{
	if(!empty($uid))
	{
		$checkId = $db->get_row("SELECT `uid`, `parameter`, `type`, `value`, `start` FROM web_site WHERE uid = '{$uid}'");
		$tpl->assign('checkId', $checkId);
		unset($checkId);
	}
	$tpl->display('siteedit.htm');
}

elseif ($op == 'cmdDel')
{
	if(!empty($uid))
	{
		$db->query("DELETE FROM web_site WHERE uid = '{$uid}'");
	}
	ShowMsg();
}