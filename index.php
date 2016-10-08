<?php

/**
 * Example Application
 *
 * @package Example-application
 */

error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
header('X-Powered-By: FXP/1.6.4.3');
@ini_set('memory_limit',       '128M');
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid',   0);
@ini_set('session.use_cookies',     1);
@ini_set('session.auto_start',      0);
@ini_set('session.cookie_lifetime', 0);

if (function_exists('ob_gzhandler')) {
	ob_start('ob_gzhandler');
} else {
	ob_start();
}

$dsql = $db = null;

function dbconnect() {
	global $dsql, $db;
	require 'config.php';
	require 'Apps/mysql_core.php';
	require 'Apps/mysql_pdo.php';
	$dsql = $db = new Mysql_pdo('mysql:host='.$dns['Host'].';dbname='.$dns['Name'], $dns['UserName'], $dns['PassWord']);
}

function daddslashes($string, $force = 0) {
	$get_magic_gpc = @get_magic_quotes_gpc();
	if(!$get_magic_gpc || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}

function getAddress() {
	$ip = false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) {
			array_unshift($ips, $ip); $ip = FALSE;
		}
		for ($i = 0; $i < count($ips); $i++)  {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function formatSizeUnits($bytes)
{
	if ($bytes >= 1.23794003928538e+27) {
	$bytes = number_format($bytes / 1.23794003928538e+27, 2) . ' BB';
	} elseif ($bytes >= 1.208925819614629e+24) {
	$bytes = number_format($bytes / 1.208925819614629e+24, 2) . ' YB';
	} elseif ($bytes >= 1.180591620717411e+21) {
	$bytes = number_format($bytes / 1.180591620717411e+21, 2) . ' ZB';
	} elseif ($bytes >= 1.152921504606847e+18) {
	$bytes = number_format($bytes / 1.152921504606847e+18, 2) . ' EB';
	} elseif ($bytes >= 1125899906842624) {
	$bytes = number_format($bytes / 1125899906842624, 2) . ' PB';
	} elseif ($bytes >= 1099511627776) {
	$bytes = number_format($bytes / 1099511627776, 2) . ' TB';
	} elseif ($bytes >= 1073741824) {
	$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
	$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
	$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
	$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
	$bytes = $bytes . ' byte';
	} else {
	  $bytes = '0 bytes';
	}
	return $bytes;
}

function formatGSizeUnits($bytes)
{
	$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	return $bytes;
}

$_formarray = Array('_GET', '_POST');
foreach($_formarray as $_request) {
	foreach($$_request as $_key => $_value) {
		${$_key} = daddslashes($_value);
	}
}

$do = empty($do) ? 'default' : $do;
$op = empty($op) ? 'default' : $op;

$savePath = "Data/session";
session_save_path($savePath);
@ini_set('session.gc_probability', 1);
session_start();

if($op == 'gmtc') {
	require 'html/index_gmtc.htm';
}

else if($op == 'down') {
	require 'html/index_down.htm';
}

else if($op == 'server') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '线路列表';
		$return_url = '?op=server';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		$serverList = $dsql->get_results("SELECT serverName, serverIP, `start` FROM web_server ORDER BY uid DESC LIMIT 0, 10;");
		require 'html/help_server.htm';
	}
}

else if($op == 'Logout') {
	$_SESSION['authuser_uid'] = NULL;
	$_SESSION['authuser_name'] = NULL;
	unset($_SESSION['authuser_uid'], $_SESSION['authuser_name']);
	header("Location: ../");
}

else if($op == 'Login') {
    if(!empty($mini_username) && !empty($mini_password)) {
		dbconnect();
		$sqlstr = "SELECT uid FROM web_user WHERE `user` = '{$mini_username}' AND `pass` = '{$mini_password}' AND level = 1 LIMIT 1";
		$checkId = $db->get_var($sqlstr);
		if(empty($checkId)) {
			echo "<script>alert('登录失败!账号或密码错误.    ');window.location='".$return_url."'</script>";
		} else {
			$_SESSION['authuser_uid']  = $checkId;
			$_SESSION['authuser_name'] = $mini_username;
			header("Location: ".$return_url);
		}
		exit;
	}
	require 'html/help_login.htm';
}

else if($op == 'faq') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '常见问题';
		$return_url = '?op=faq';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		require 'html/help_faq.htm';
	}
}

else if($op == 'pass') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '修改密码';
		$return_url = '?op=pass';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		require 'html/index_pass.htm';
	}
}

else if($op == 'info') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '个人资料';
		$return_url = '?op=info';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		$sqlstr = "SELECT `user`, `realname`, `qq`, `phone`, `address` FROM web_user WHERE uid = '{$_SESSION['authuser_uid']}'";
		$checkcontact = $db->get_row($sqlstr);
		require 'html/index_info.htm';
	}
}

else if($op == 'help') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '使用方法';
		$return_url = '?op=help';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		$open = array('ios', 'android2', 'android4', 'mac', 'winxp', 'win7', 'win8', 'surface', 'Ubuntu', 'ps3');
		if(in_array($do, $open)) {
			require 'html/help/'.$do.'.htm';
		} else {
			require 'html/index_help.htm';
		}
	}
}

else if($op == 'catbuy') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '续费开通';
		$return_url = '?op=info';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		require 'html/index_catbuy.htm';
	}
}

else if($op == 'docatbuy') {
    dbconnect();
	$checkId = $db->get_row("SELECT `uid`, `price`, `start`, `acct`, `hour`, `number` FROM web_card WHERE `card` = '{$cardId}' AND `pass` = '{$cardPass}' AND `start` = 1 LIMIT 1");
	if(empty($checkId->uid)) {
		echo "<script>alert('充值失败! 您输入的卡号或卡密有误请核对后再试.         ');window.location='?op=catbuy'</script>";
		exit;
	}
	
	$checkUser = $db->get_row("SELECT uid, `user`, `group`, `expires`, `number`, `userFlow`, `level` FROM web_user WHERE `uid` = '{$_SESSION['authuser_uid']}'");
	if(empty($checkUser->uid)) {
		echo "<script>alert('充值失败! 数据异常请退出后重新登录再试.         ');window.location='?op=catbuy'</script>";
		exit;
	}
	 
	$getGroups = $db->get_var("SELECT `acct` FROM web_group WHERE `uid` = '{$checkUser->group}'");
	if($getGroups != $checkId->acct) {
		echo "<script>alert('充值失败! 该充值卡:  $cardId  ".'\n'."不适用该用户组请联系客服.     ');window.location='?op=catbuy'</script>";
		exit;
	}

	$number = empty($checkId->number) ? $checkUser->number : $checkId->number;

	if($checkId->acct == 1) {
		$expires = $checkUser->expires;
		if($checkUser->expires <= date('Y-m-d H:i:s')) {
			$expires = date('Y-m-d H:i:s');
		}
		$expires = date("Y-m-d H:i:s",strtotime($expires. $checkId->hour ." hour"));
		$dsql->query("UPDATE web_user SET `expires` = '{$expires}', `number` = '{$number}' WHERE `uid` = '{$checkUser->uid}'");
		$msg = '账号['.$checkUser->user.']成功冲入'. $checkId->hour .'个小时  \n过期时间为: ' . $expires;
	} else {
		$userFlow = $checkUser->userFlow + $checkId->hour;
		$dsql->query("UPDATE web_user SET `userFlow` = '{$userFlow}', `number` = '{$number}' WHERE `uid` = '{$checkUser->uid}'");
		$Flowhour = formatSizeUnits($checkId->hour);
		$couNtFlow = formatSizeUnits($userFlow);
		$msg = '账号['.$checkUser->user.']成功冲入'. $Flowhour .'流量  \n账号剩余: ' . $couNtFlow .'流量';
	}
	
	$expires = date('Y-m-d H:i:s');
	$getAddress = getAddress();
	$db->query("UPDATE web_card SET `start` = '3', `user` = '{$checkUser->user}', `useTime` = '{$expires}', `ip` = '{$getAddress}' WHERE `card` = '{$cardId}'");

	$orderno = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	$dsql->query("INSERT INTO web_order (`user`, `number`, `price`, `addTime`, `acct`, `start`, `card`, `hour`)
		VALUES ('{$checkUser->user}', '{$orderno}', '{$checkId->price}', '{$expires}', '{$getGroups}', '1', '{$cardId}', '{$checkId->hour}')");
	
	echo "<script>alert('".$msg."');window.location='?op=catbuy'</script>";
	
}

else if($op == 'checkuser') {
    dbconnect();
	$sqlstr  = "SELECT uid FROM web_user WHERE `user` = '{$username}' LIMIT 1";
	$checkId = $db->get_var($sqlstr);
	$getUser  = empty($checkId) ? 1 : 0;
	echo $getUser;
}

else if($op == 'charge') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '充值记录';
		$return_url = '?op=charge';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		$sqlstr = "SELECT `user`, `number`, `price`, `start` FROM web_order WHERE `user` = '{$_SESSION['authuser_name']}' ORDER BY uid DESC";
		$chargeList = $db->get_results($sqlstr);
		require 'html/index_charge.htm';
	}
}

else if($op == 'flow') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '流量记录';
		$return_url = '?op=flow';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		$sqlstr = "SELECT  onTime, SUM(offTime) as offTime, SUM(Uplink) as Uplink, SUM(Downlink) as Downlink FROM web_online WHERE `UserName` = '{$_SESSION['authuser_name']}' and onTime >= NOW() - interval 365 day group by DATE_FORMAT(onTime,'%m') ORDER BY uid DESC";
	//echo $sqlstr;
		$flowList = $db->get_results($sqlstr);

		$result = array();
		foreach($flowList as $key=>$item){
			$date = new DateTime($item->onTime);
			$result[$key + 1]['time'] = $date->format('Y-m');
			
			$result[$key + 1]['hour'] = ceil(($item->offTime)/86400) ."小时";
			$result[$key + 1]['up'] = formatSizeUnits($item->Uplink);
			$result[$key + 1]['down'] = formatSizeUnits($item->Downlink);
			$result[$key + 1]['total'] = formatSizeUnits($item->Downlink + $item->Uplink);
			
		}
		

		$sqlstr2 = "SELECT onTime, SUM(offTime) as offTime, SUM(Uplink) as Uplink, SUM(Downlink) as Downlink FROM web_online WHERE `UserName` = '{$_SESSION['authuser_name']}' and onTime >=  NOW() - interval 1 day ";
	//	ECHO $sqlstr2;DIE;
		$flowList2 = $db->get_results($sqlstr2);
		foreach($flowList2 as $key=>$item){
			$result[0]['time'] ="24小时";
			
			$result[0]['hour'] = ceil(($item->offTime)/86400) ."小时";
			$result[0]['up'] = formatSizeUnits($item->Uplink);
			$result[0]['down'] = formatSizeUnits($item->Downlink);
			$result[0]['total'] = formatSizeUnits($item->Downlink + $item->Uplink);
		}

		ksort($result);
		require 'html/index_flow.htm';
	}
}

else if($op == 'session') {
	if(empty($_SESSION['authuser_uid'])) {
		$ClickName = '在线记录';
		$return_url = '?op=session';
		require 'html/index_box.htm';
	} else {
		dbconnect();
		$sqlstr = "SELECT `UserName`, `serverIP`, `Intranet`, `PublicIp`, `Uplink`, `Downlink`, `onTime` FROM web_online WHERE `UserName` = '{$_SESSION['authuser_name']}' AND offTime = 1 ORDER BY uid DESC";
	    $onlineList = $db->get_results($sqlstr);
		require 'html/index_session.htm';
	}
}

else if($op == 'domodi') {
    dbconnect();
	$dsql->query("UPDATE web_user SET `realname` = '{$title}', `qq` = '{$qq}',
        `phone` = '{$tel}', `address` = '{$address}' WHERE uid = '{$_SESSION['authuser_uid']}'");
	echo "<script>alert('更新成功! 成功更新个人资料.    ');window.location='?op=info'</script>";
}

else if($op == 'dochangepwd') {
    if(empty($pwd)) {
		echo "<script>alert('修改失败! 原密码不能为空.         ');window.location='?op=pass'</script>";
		exit;
	}
    if(empty($pwd1)) {
		echo "<script>alert('修改失败! 新密码不能为空.         ');window.location='?op=pass'</script>";
		exit;
	}
    if(empty($pwd2)) {
		echo "<script>alert('修改失败! 确认新密码不能为空.         ');window.location='?op=pass'</script>";
		exit;
	}
    if($pwd1 != $pwd2) {
		echo "<script>alert('修改失败! 两次输入密码不同请重新输入.         ');window.location='?op=pass'</script>";
		exit;
	}
    dbconnect();
	$sqlstr  = "SELECT uid FROM web_user WHERE `uid` = '{$_SESSION['authuser_uid']}' AND `pass` = '{$pwd}'";
	$checkId = $db->get_var($sqlstr);
    if(empty($checkId)) {
		echo "<script>alert('修改失败! 原密码不正确.         ');window.location='?op=pass'</script>";
		exit;
	}
	$dsql->query("UPDATE web_user SET `pass` = '{$pwd2}' WHERE uid = '{$checkId}'");
	echo "<script>alert('密码修改成功请牢记!   ');window.location='?op=pass'</script>";
}

else if($op == 'doreg') {
    if(empty($username)) {
		echo "<script>alert('注册失败! 用户名不能为空.         ');window.location='".$return_url."'</script>";
		exit;
	}

    dbconnect();
	$sqlstr = "SELECT uid FROM web_user WHERE `user` = '{$username}' AND `pass` = '{$password}' LIMIT 1";
	$checkId = $db->get_var($sqlstr);
    if(!empty($checkId)) {
		echo "<script>alert('注册失败! 用户名已存在.         ');window.location='".$return_url."'</script>";
		exit;
	}

	// 查询注册
	$sqlstr = "SELECT `regMail`, `regTitle`, `regContent`, `regTime`, `regFlow`, `regDitto` FROM web_regist WHERE uid = '1'";
	$checkReg = $db->get_row($sqlstr);

    // 同一IP重复注册
	$getAddress = getAddress();
	$serverTime = date('Y-m-d H:i:s');
	$regDitto  = $checkReg->regDitto * 3600;
	if(!empty($regDitto)) {
		// 验证IP注册次数
		$sqlstr    =  "SELECT `regTime` FROM web_user WHERE `regIp` = '{$getAddress}' ORDER BY uid DESC LIMIT 0, 1;";
		$checkTime   =  $db->get_var($sqlstr);
		$getTime   = strtotime($serverTime) - strtotime($checkTime);
		if($getTime <= $regDitto) {
			echo "<script>alert('你的IP地址注册频繁, 已经被锁定, 建议稍后尝试注册!      ');window.location='".$return_url."'</script>";
			exit;
		}
	}

	// 注册用户组
	$sqlstr = "SELECT `value` FROM web_site WHERE `parameter` = 'reg_userNowGroups' AND `type` = '1' LIMIT 1";
	$checkGroup = $db->get_var($sqlstr);

	// 查询组类别
	$sqlstr = "SELECT `acct` FROM web_group WHERE `uid` = '{$checkGroup}'";
	$checkAcct = $db->get_var($sqlstr);

    // 验证赠送时间
	$userFlow   = 0;
	if($checkAcct == 1) {
		$addHour = @ceil($checkReg->regTime);
		$serverTime = date('Y-m-d H:i:s', strtotime("+ $addHour hour", strtotime($serverTime)));
	}

	// 验证赠送流量
	else if($checkAcct == 2) {
		$userFlow = $checkReg->regFlow * 1048576;
	}

	// 写入注册资料
    $dsql->query("INSERT INTO web_user (`user`, `pass`, `group`, `expires`, `number`, `userFlow`, `email`, `regTime`, `regIp`)
	    VALUES ('{$username}', '{$password}', '{$checkGroup}', '{$serverTime}', '1', '{$userFlow}', '{$mail}', NOW(), '{$getAddress}')");

	// 发送电子邮件
    if($checkReg->regMail == 2) {

 		$checkId = $dsql->get_row("SELECT `mailOpen`, `mailHost`, `mailPort`, `mailFrom`, `mailAuth`, `mailUser`,
				`mailPassword` FROM web_email WHERE uid = '1'");
		if($checkId->mailOpen == 1) {

			// 邮件标题
			$sqlstr = "SELECT `value` FROM web_site WHERE `parameter` = 'sitename' AND `type` = '1' LIMIT 1";
			$sitename = $db->get_var($sqlstr);
			$regTitle = str_replace("{username}", $username, $checkReg->regTitle);
			$regTitle = str_replace("{sitename}", $sitename, $regTitle);

			// 邮件内容
			$sqlstr = "SELECT `value` FROM web_site WHERE `parameter` = 'url' AND `type` = '1' LIMIT 1";
			$siteurl = $db->get_var($sqlstr);
			$regContent = str_replace("{username}", $username, $checkReg->regContent);
			$regContent = str_replace("{sitename}", $sitename, $regContent);
			$regContent = str_replace("{url}", $siteurl, $regContent);
			$regContent = str_replace("{time}", $serverTime, $regContent);

		    // 发送邮件
		    $cfg_smtp_server    = $checkId->mailHost;
			$cfg_smtp_port      = $checkId->mailPort;
			$cfg_smtp_auth      = empty($checkId->mailAuth) ? false : true;
			$cfg_smtp_usermail  = $checkId->mailUser;
			$cfg_smtp_password  = $checkId->mailPassword;
			$cfg_smtp_email     = $mail;
			$cfg_webname        = $checkId->mailFrom;
			$mailtitle          = $regTitle;
			$mailbody           = $regContent;
			$mailtype           = 'HTML';
			require_once('Apps/mail.class.php');
			$smtp = new smtp($cfg_smtp_server, $cfg_smtp_port, $cfg_smtp_auth, $cfg_smtp_usermail, $cfg_smtp_password);
			$smtp->debug = false;
			$smtp->sendmail($cfg_smtp_email, $cfg_webname, $cfg_smtp_usermail, $mailtitle, $mailbody, $mailtype);
		}
	}
	$sqlstr = "SELECT uid FROM web_user WHERE `user` = '{$username}' LIMIT 1";
	$checkUId = $db->get_var($sqlstr);
	$_SESSION['authuser_uid']  = $checkUId;
	$_SESSION['authuser_name'] = $username;
    header("Location: ?op=catbuy");

}

else if($op == 'dofindpwd') {
    if(empty($username)) {
		echo "<script>alert('找回失败! 请输入您注册时的用户名.         ');window.location='".$return_url."'</script>";
		exit;
	}
    if(empty($mail)) {
		echo "<script>alert('找回失败! 请输入您注册用的 Email.         ');window.location='".$return_url."'</script>";
		exit;
	}
    dbconnect();
	$sqlstr = "SELECT `pass` FROM web_user WHERE `user` = '{$username}' AND `email` = '{$mail}' LIMIT 1";
	$checkPass = $db->get_var($sqlstr);
    if(empty($checkPass)) {
		echo "<script>alert('找回失败!  注册Email不匹配.    ');window.location='".$return_url."'</script>";
		exit;
	}
	$checkId = $dsql->get_row("SELECT `mailOpen`, `mailHost`, `mailPort`, `mailFrom`, `mailAuth`, `mailUser`,
			`mailPassword` FROM web_email WHERE uid = '1'");
	$sqlstr = "SELECT `value` FROM web_site WHERE `parameter` = 'sitename' AND `type` = '1' LIMIT 1";
	$sitename = $db->get_var($sqlstr);
	$sqlstr = "SELECT `value` FROM web_site WHERE `parameter` = 'url' AND `type` = '1' LIMIT 1";
	$siteurl = $db->get_var($sqlstr);
	if($checkId->mailOpen == 1) {
		$cfg_smtp_server    = $checkId->mailHost;
		$cfg_smtp_port      = $checkId->mailPort;
		$cfg_smtp_auth      = empty($checkId->mailAuth) ? false : true;
		$cfg_smtp_usermail  = $checkId->mailUser;
		$cfg_smtp_password  = $checkId->mailPassword;
		$cfg_smtp_email     = $mail;
		$cfg_webname        = $checkId->mailFrom;
		$mailtitle          = $sitename . ' - 会员密码找回通知';
		$mailbody  = '';
		$mailbody .= "尊敬的用户[{$username}]，您好：\r\n";
		$mailbody .= "欢迎使用密码找回功能。\r\n";
		$mailbody .= "您当前密码为: {$checkPass} \r\n";
		$mailbody .= $sitename ."官方网址: \r\n\r\n";
		$mailbody .= "{$siteurl}\r\n\r\n";
        $mailbody .= "本邮件是系统自动发送的,请勿直接回复！\r\n";
		$mailtype  = 'TXT';
		require_once('Apps/mail.class.php');
		$smtp = new smtp($cfg_smtp_server, $cfg_smtp_port, $cfg_smtp_auth, $cfg_smtp_usermail, $cfg_smtp_password);
		$smtp->debug = false;
		$smtp->sendmail($cfg_smtp_email, $cfg_webname, $cfg_smtp_usermail, $mailtitle, $mailbody, $mailtype);
	}
	echo "<script>alert('找回成功! 密码已经发送到您注册的邮箱.         ');window.location='".$return_url."'</script>";
}

else if($op == 'forget') {
	require 'html/index_forget.htm';
}

else if($op == 'about') {
	require 'html/index_about.htm';
}

else if($op == 'contact') {
	require 'html/index_contact.htm';
}

else if($op == 'swhz') {
	require 'html/index_swhz.htm';
}

else if($op == 'reg') {
	require 'html/index_reg.htm';
}

else {
	require 'html/index_index.htm';
}
