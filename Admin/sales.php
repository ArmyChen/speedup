<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

if($op == 'default')
{
	$tpl->assign('valTime', $valTime);
	$tpl->display('sales.htm');
}

elseif ($op == 'getData') {
	
	if($time == 'day0') {
	    $where =  " AND to_days(addTime) = to_days(now()) ";
	} elseif($time == 'day1'){
		$start = date('Y-m-d', strtotime ("-1 day", time()));
		$endTime = date('Y-m-d');
		$where = " AND addTime BETWEEN '{$start}' AND '{$endTime}' ";
	} elseif($time == 'day2'){
		$start = date('Y-m-d', strtotime ("-2 day", time()));
		$endTime = date('Y-m-d');
		$where = " AND addTime BETWEEN '{$start}' AND '{$endTime}' ";
	}  elseif($time == 'day3'){
		$start = date('Y-m-d', strtotime ("-3 day", time()));
		$endTime = date('Y-m-d');
		$where = " AND addTime BETWEEN '{$start}' AND '{$endTime}' ";
	} elseif($time == 'week0'){
	    $where =  " AND WEEKOFYEAR(addTime) = WEEKOFYEAR(NOW()) ";
	} elseif($time == 'week1'){
		$start = date('Y-m-d', strtotime('-1 monday', time()));
		$endTime = date('Y-m-d', strtotime ("-7 day", strtotime($start)));
		$where = " AND addTime BETWEEN '{$endTime}' AND '{$start}' ";
	} elseif($time == 'month0'){
	    $where =  " AND date_format(addTime, '%Y-%m') = date_format(now(), '%Y-%m') ";
	} elseif($time == 'month1'){
	    $where =  " AND date_format(addTime, '%Y-%m') = date_format( DATE_SUB(curdate(), INTERVAL 1 MONTH), '%Y-%m' ) ";
	}  elseif($time == 'month2'){
	    $where =  " AND date_format(addTime, '%Y-%m') = date_format( DATE_SUB(curdate(), INTERVAL 2 MONTH), '%Y-%m' ) ";
	}
	$sqlstr = "SELECT SUM(price) FROM web_order WHERE `start` != 1 ";
	$failure = $dsql->get_var($sqlstr);
	$sqlstr = "SELECT SUM(price) FROM web_order WHERE `start` = 1 " .$where;
	$success = $dsql->get_var($sqlstr);
	if(empty($failure) && empty($success)) {
	    $Text = "[]";
	} else {
	    $Text = '[{"value":"'.$failure.'","name":"未支付"}, {"value":"'.$success.'","name":"已支付"}]';
	}
	echo $Text;
	unset($sqlstr, $failure, $success, $Text);
}

	 