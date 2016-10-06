<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$Where = " WHERE `start` = '3' ";
$pageURL = '?do='.$do.'&m='.$m.'&card='.$card.'&user='.$user.'&pn';
if($m == 'search') {
	if(!empty($card)) {
		$Where .= " AND INSTR(`card`, '{$card}') ";
		$tpl->assign('card', $card);
		unset($card);
	}
	if(!empty($user)) {
		$Where .= " AND INSTR(`user`, '{$user}') ";
		$tpl->assign('user', $user);
		unset($user);
	}
}

$RetList = adminPage('web_card', $Where, $pn, $pageURL, 'uid', 50);
foreach ($RetList[0] as $row) {
	$keyword += $row->price;
}
$keyword = number_format($keyword, 2);

if($RetList[1]) {
	$sqlstr = "SELECT SUM(price) FROM web_card WHERE `start` = 3";
	$checkId = $dsql->get_var($sqlstr);
	$tpl->assign('checkId', $checkId);
	unset($sqlstr, $checkId);
}

$tpl->registerPlugin("function","cardType", "getcardType");
$tpl->assign('RetList', $RetList);
$tpl->assign('keyword', $keyword);
unset($pageURL, $RetList, $keyword);
$tpl->display('cradViewList.htm');