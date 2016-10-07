<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$sqlstr = "SELECT uid, `name`, `acct` FROM web_group ORDER BY uid DESC";
$groupList = $dsql->get_results($sqlstr);

if($op == 'default')
{
	$Where = " WHERE `level` != 2";
	$pageURL = '?do='.$do.'&m='.$m.'&username='.$username.'&group='.$group.'&acct='.$acct.'&status='.$status.'&expires='.$expires.'&realname='.$realname.'&profile='.$profile.'&pn';
	if($m == 'search') {
		if(!empty($username)) {
			$Where .= " AND INSTR(`user`, '{$username}') ";
			$tpl->assign('username', $username);
			unset($username);
		}
		if(!empty($realname)) {
			$Where .= " AND INSTR(`realname`, '{$realname}') ";
			$tpl->assign('realname', $realname);
			unset($realname);
		}
		if(!empty($profile)) {
			$Where .= " AND INSTR(`profile`, '{$profile}') ";
			$tpl->assign('profile', $profile);
			unset($profile);
		}
		if(!empty($group)) {
			$Where .= " AND `group` = '{$group}'";
			$tpl->assign('group', $group);
			unset($group);
		}
		if(!empty($acct)) {
			if($acct == 'routine') {
				$sqlstr = "SELECT uid FROM web_group WHERE `acct` = 1";
				$dataList = $dsql->get_results($sqlstr);
			} else {
				$sqlstr = "SELECT uid FROM web_group WHERE `acct` = 2";
				$dataList = $dsql->get_results($sqlstr);
			}
			foreach ($dataList as $row ) {
				$keyword .= $row->uid . ',';
			}
			$keyword = substr($keyword, 0, -1);
			$Where .= " AND `group` in($keyword)";
			$tpl->assign('acct', $acct);
			unset($acct, $sqlstr, $dataList, $keyword);
		}
		if(!empty($status)) {

			if($status == 'normal') {
				$Where .= " AND `lockuser` = 1";
			}
			elseif($status == 'stoped') {
				$Where .= " AND `lockuser` = 2";
			}
			elseif($status == 'online') {
				$Where .= " AND `online` != 0";
			}
			$tpl->assign('status', $status);
			unset($status);
		}
		if(!empty($expires)) {
			$openTime = date('Y-m-d H:i:s');
			if($expires == '24') {
				$addTime = date('Y-m-d H:i:s',strtotime('+1 day'));
				$Where .= " AND `expires` BETWEEN '{$openTime}' AND '{$addTime}'";
			}
			elseif($expires == '72') {
				$addTime = date('Y-m-d H:i:s',strtotime('+3 day'));
				$Where .= " AND `expires` BETWEEN '{$openTime}' AND '{$addTime}'";
			}
			elseif($expires == '168') {
				$addTime = date('Y-m-d H:i:s',strtotime('+7 day'));
				$Where .= " AND `expires` BETWEEN '{$openTime}' AND '{$addTime}'";
			}
			elseif($expires == '360') {
				$addTime = date('Y-m-d H:i:s',strtotime('+15 day'));
				$Where .= " AND `expires` BETWEEN '{$openTime}' AND '{$addTime}'";
			}
			elseif($expires == '720') {
				$addTime = date('Y-m-d H:i:s',strtotime('+30 day'));
				$Where .= " AND `expires` BETWEEN '{$openTime}' AND '{$addTime}'";
			}
			elseif($expires == 'expire') {
				$Where .= " AND `expires` <= NOW()";
			}
			elseif($expires == 'flow') {
				$Where .= " AND `userFlow` <= 0";
			}
			$tpl->assign('expires', $expires);
			unset($expires, $openTime);
		}
	}
	$RetList = adminPage('web_user', $Where, $pn, $pageURL, 'uid', 50);
	$tpl->registerPlugin("function","userGroup", "getUserGroupName");
	$tpl->registerPlugin("function","userType", "getUserGroupType");
	$tpl->registerPlugin("function","userAcct", "getuserAcct");
	$tpl->registerPlugin("function","userOnline24", "getuserOnline24");
	$tpl->registerPlugin("function","userOnline24updown", "getuserOnline24updown");
	$tpl->registerPlugin("function","userOnline30", "getuserOnline30");
	$tpl->registerPlugin("function","userOnline30updown", "getuserOnline30updown");
	$tpl->assign('RetList', $RetList);
	$tpl->assign('groupList', $groupList);
	unset($groupList, $RetList, $pageURL);
	$tpl->display('acc.htm');
}

elseif ($op == 'cmdEdit')
{
	if(!empty($uid))
	{
		$sqlstr = "SELECT `uid`, `user`, `pass`, `group`, `expires`, `number`, `userFlow`, `online`, `lockuser`, `allowip`, `fixedip`, `lockbrain`, `realname`, `qq`, `email`, `phone`, `address`, `profile`, `regTime` FROM web_user WHERE uid = '{$uid}' AND `level` != 2";
		$checkId = $db->get_row($sqlstr);
		$sqlstr = "SELECT `onTime` FROM web_online WHERE UserName = '{$checkId->user}' ORDER BY uid DESC LIMIT 0, 1";
		$Login = $db->get_var($sqlstr);
		$userFlow = @ceil($checkId->userFlow / 1048576);
		$tpl->assign('Login', $Login);
		$tpl->assign('checkId', $checkId);
		$tpl->assign('userFlow', $userFlow);
		unset($sqlstr, $checkId, $Login, $userFlow);
	}
	$addTime = date('Y-m-d H:i:s',strtotime('+30 day'));
	$tpl->assign('addTime', $addTime);
	$tpl->assign('groupList', $groupList);
	unset($groupList, $addTime);
	$tpl->display('useredit.htm');
}

elseif ($op == 'cmdsave')
{
	if(empty($group))
	{
		ShowMsg('fail', '账号所属用户组不能为空.');
	}
	$userFlow = $userFlow * 1048576;
	if(empty($uid))
	{
		$sqlstr = "SELECT `uid` FROM web_user WHERE user = '{$user}' LIMIT 1";
		$checkId = $db->get_var($sqlstr);
		if(!empty($checkId))
		{
            ShowMsg('fail', '该账号'.$user.'已经存在.');
		}
		$db->query("INSERT INTO web_user (`user`, `pass`, `group`, `expires`, `number`, `userFlow`, `lockuser`, `allowip`, `fixedip`, `lockbrain`, `realname`, `qq`, `email`, `phone`, `address`, `profile`, `regTime`)
		    VALUES ('{$user}', '{$pass}', '{$group}', '{$expires}', '{$number}', '{$userFlow}', '{$lockuser}', '{$allowip}', '{$fixedip}', '{$lockbrain}', '{$realname}', '{$qq}', '{$email}', '{$phone}', '{$address}', '{$profile}', NOW())");
	}
	else
	{
		$dsql->query("UPDATE web_user SET `pass` = '{$pass}', `group` = '{$group}', `expires` = '{$expires}', `number` = '{$number}', `userFlow` = '{$userFlow}', `lockuser` = '{$lockuser}',
		    `allowip` = '{$allowip}', `fixedip` = '{$fixedip}', `lockbrain` = '{$lockbrain}', `realname` = '{$realname}', `qq` = '{$qq}', `email` = '{$email}', `phone` = '{$phone}', `address` = '{$address}', `profile` = '{$profile}' WHERE uid = '{$uid}' AND `level` != 2");
	}
    ShowMsg();
}

elseif ($op == 'checkGroup')
{
	$sqlstr = "SELECT `acct` FROM web_group WHERE uid = '{$group}'";
	$checkId = $db->get_var($sqlstr);
	echo '{"acct":"'.$checkId.'"}';
}

elseif ($op == 'cmdDel')
{
	if(!empty($user))
	{
		$db->query("DELETE FROM web_online WHERE `UserName` = '{$user}'");
		$db->query("DELETE FROM web_user WHERE `user` = '{$user}' AND `level` != 2");
	}
	ShowMsg();
}

elseif ($op == 'doBatchDelete')
{
	foreach ($aid as $tid) {
		$sqlstr = "SELECT `user` FROM web_user WHERE uid = '{$tid}'";
		$checkId = $db->get_var($sqlstr);
		if(!empty($checkId))
		{
			$db->query("DELETE FROM web_online WHERE `UserName` = '{$checkId}'");
			$db->query("DELETE FROM web_user WHERE `user` = '{$checkId}' AND `level` != 2");
		}
	}
	ShowMsg();
}

elseif ($op == 'doRecoverIp')
{
	$keyword = 0;
	$sqlstr = "SELECT uid FROM web_user WHERE fixedip != ''";
	$userList = $dsql->get_results($sqlstr);
	foreach ($userList as $row) {
	    $dsql->query("UPDATE web_user SET `fixedip` = '' WHERE uid = '{$row->uid}' AND `level` != 2");
		$keyword++;
	}
	ShowMsg($keyword);
}

elseif ($op == 'doBatchDel')
{
	$keyword = 0;
	$sqlstr = "SELECT uid, `user`, `group` FROM web_user WHERE expires < NOW() AND `level` != 2";
	$userList = $dsql->get_results($sqlstr);
	foreach ($userList as $row) {
		if(!empty($row->group))
		{
			$sqlstr = "SELECT `acct` FROM web_group WHERE uid = '{$row->group}'";
			$checkId = $db->get_var($sqlstr);
			if($checkId == 1) {
				$db->query("DELETE FROM web_online WHERE `UserName` = '{$row->user}'");
				$db->query("DELETE FROM web_user WHERE `user` = '{$row->user}'");
				$keyword++;
			}
		}
	}
	ShowMsg($keyword);
}

elseif ($op == 'doAddFlow')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$dsql->query("UPDATE web_user SET `userFlow` = `userFlow` + 1073741824 WHERE `uid` = '{$tid}' AND `level` != 2");
		$keyword++;
	}
	ShowMsg($keyword);
}

elseif ($op == 'doAddTime')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$lodTime = date('Y-m-d H:i:s');
		$getTime = $dsql->get_var("SELECT `expires` FROM web_user WHERE `uid` = '{$tid}'");
		if($getTime >= $lodTime) {
            $lodTime = $getTime;
		}
		$strtime = strtotime($lodTime);
		$getTime = date('Y-m-d H:i:s', strtotime('+30 day', $strtime));
		$dsql->query("UPDATE web_user SET `expires` = '{$getTime}' WHERE `uid` = '{$tid}' AND `level` != 2");
		$keyword++;
	}
	ShowMsg($keyword);
}

elseif ($op == 'doUpUserGroup')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$dsql->query("UPDATE web_user SET `group` = '{$group}', `expires` = NOW(), `userFlow` = '0' WHERE `uid` = '{$tid}' AND `level` != 2");
		$keyword++;
	}
	ShowMsg($keyword);
}

elseif ($op == 'doStopUser')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$dsql->query("UPDATE web_user SET `lockuser` = 2 WHERE `uid` = '{$tid}' AND `level` != 2");
		$keyword++;
	}
	ShowMsg($keyword);
}

elseif ($op == 'doRestoreUser')
{
	$keyword = 0;
	foreach ($aid as $tid) {
		$dsql->query("UPDATE web_user SET `lockuser` = 1 WHERE `uid` = '{$tid}' AND `level` != 2");
		$keyword++;
	}
	ShowMsg($keyword);
}