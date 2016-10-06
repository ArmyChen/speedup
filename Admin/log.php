<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$pageURL = '?do='.$do.'&m='.$m.'&user='.$user.'&open='.$open.'&pn';
	if($m == 'search') {
		$Where = " WHERE uid = uid ";
		if(!empty($user)) {
			$getuser = $db->get_var("SELECT `uid` FROM web_admin WHERE `name` = '{$user}'");
			$Where .= " && `user` = '{$getuser}'";
			$tpl->assign('user', $user);
			unset($user, $getuser);
		}
		if(!empty($open)) {
			$Where .= " && INSTR(`open`, '{$open}') ";
			$tpl->assign('open', $open);
			unset($open);
		}
	}
	$RetList = adminPage('web_log', $Where, $pn, $pageURL, 'uid');
	$tpl->assign('RetList', $RetList);
	$tpl->registerPlugin("function","getName", "getAdminName");
	$tpl->registerPlugin("function","getIp", "getLogAddress");
	$tpl->display('log.htm');
}

elseif ($op == 'cmdDel')
{
	$dsql->query("DELETE FROM web_online WHERE `onTime` <= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)");
	$dsql->query("DELETE FROM web_log WHERE `addtime` <= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)");
	ShowMsg();
}