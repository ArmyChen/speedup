<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

//$out_trade_no = date('Ymd').time().rand(10,99);

if($op == 'default')
{
	$Where = " WHERE uid = uid ";
	$pageURL = '?do='.$do.'&m='.$m.'&user='.$user.'&number='.$number.'&pn';
	if($m == 'search') {
		if(!empty($user)) {
			$Where .= " AND INSTR(`user`, '{$user}') ";
			$tpl->assign('user', $user);
			unset($user);
		}
		if(!empty($number)) {
			$Where .= " AND INSTR(`number`, '{$number}') ";
			$tpl->assign('number', $number);
			unset($number);
		}
	}
	$RetList = adminPage('web_order', $Where, $pn, $pageURL, 'uid', 50);

	foreach ($RetList[0] as $row) {
		$keyword += $row->price;
	}
	$keyword = number_format($keyword, 2);

	if($RetList[1]) {
		$sqlstr = "SELECT SUM(price) FROM web_order WHERE `start` = 1";
		$checkId = $dsql->get_var($sqlstr);
		$tpl->assign('checkId', $checkId);
		unset($sqlstr, $checkId);
	}

	$tpl->registerPlugin("function", "orderType", "getorderType");
	$tpl->assign('keyword', $keyword);
	$tpl->assign('RetList', $RetList);
	unset($RetList, $keyword);
	$tpl->display('order.htm');
}

elseif ($op == 'cmdcheXiao')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$checkId = $db->get_row("SELECT `user`, `start`, `acct`, `hour` FROM web_order WHERE `uid` = '{$tid}'");
		if($checkId->start == 1) {
			$checkuser = $db->get_row("SELECT `uid`, `expires`, `userFlow` FROM web_user WHERE `user` = '{$checkId->user}'");
			if(!empty($checkuser->uid)) {
				if($checkId->acct == 1) {
					$loadTime = strtotime ($checkuser->expires);
					$loadHour = @ceil($checkId->hour / 24);;
					$userhour = date('Y-m-d H:i:s', strtotime ("-$loadHour day", $loadTime));
					if($userhour < date('Y-m-d H:i:s')){
						$userhour = date('Y-m-d H:i:s');
					}
					$dsql->query("UPDATE web_user SET `expires` = '{$userhour}' WHERE `uid` = '{$checkuser->uid}'");
				} else {
					$userhour = $checkuser->userFlow - $checkId->hour;
					if($userhour < 0 ) {
						$userhour = 0;
					}
					$dsql->query("UPDATE web_user SET `userFlow` = '{$userhour}' WHERE `uid` = '{$checkuser->uid}'");
				}
			}
			$dsql->query("UPDATE web_order SET `start` = '2' WHERE `uid` = '{$tid}'");
			$keyword++;
		}
	}
	ShowMsg($keyword);
}

elseif ($op == 'cmdDel')
{
	foreach ($aid as $tid) {
		$db->query("DELETE FROM web_order WHERE uid = '{$tid}'");
	}
	ShowMsg();
}