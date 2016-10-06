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
	$RetList = adminPage('web_cat', $Where, $pn, $pageURL, 'Pos DESC, uid ');
	$tpl->assign('RetList', $RetList);
	$tpl->registerPlugin("function","formatSize", "getSizeUnits");
	unset($RetList, $RetList);
	$tpl->display('cardType.htm');
}

else if ($op == 'cmdsave')
{
	$format_flow = $flow * 1048576;
	if(empty($uid))
	{
		$db->query("INSERT INTO web_cat (`name`, `acct`, `hour`, `flow`, `price`, `number`, `pos`, `addTime`)
		    VALUES ('{$name}', '{$acct}', '{$hour}', '{$format_flow}', '{$price}', '{$number}', '{$pos}', CURDATE())");
	}
	else
	{
		$dsql->query("UPDATE web_cat SET `name` = '{$name}', `acct` = '{$acct}', `hour` = '{$hour}', `flow` = '{$format_flow}', 
		    `price` = '{$price}', `number` = '{$number}', `pos` = '{$pos}' WHERE uid = '{$uid}'");
	}
    ShowMsg();
}

elseif ($op == 'cmdEdit')
{
	if(!empty($uid))
	{
		$checkId = $db->get_row("SELECT `uid`, `name`, `acct`, `hour`, `flow`, `price`, `number`, `pos` FROM web_cat WHERE uid = '{$uid}'");
		$tpl->assign('checkId', $checkId);
		$format_flow = @ceil($checkId->flow / 1048576);
		$tpl->assign('format_flow', $format_flow);
		unset($checkId, $format_flow);
	}
	$tpl->display('cardTypeedit.htm');
}

elseif ($op == 'cmdDel')
{
	if(!empty($uid))
	{
		$db->query("DELETE FROM web_cat WHERE uid = '{$uid}'");
	}
	ShowMsg();
}