<?php

/**
 * Example Application
 *
 * @package Example-application
 */

require '../Data/common.inc.php';

function rcEcode ($Text) {
	$cipher = '';
	$key[] = $box[] = array();
	$pass = '2147483648';
	$pLenin = strlen($pass);
	$nLenin = strlen($Text);
	for ($i = 0; $i < 256; $i++)
	{
		$key[$i] = ord($pass[$i % $pLenin]);
		$box[$i] = $i;
	}
	for ($n = $i = 0; $i < 256; $i++)
	{
		$n = ($n + $box[$i] + $key[$i]) % 256;
		$bom = $box[$i];
		$box[$i] = $box[$n];
		$box[$n] = $bom;
	}
	for ($a = $n = $i = 0; $i < $nLenin; $i++)
	{
		$a = ($a + 1) % 256;
		$n = ($n + $box[$a]) % 256;
		$bom = $box[$a];
		$box[$a] = $box[$n];
		$box[$n] = $bom;
		$k = $box[(($box[$a] + $box[$n]) % 256)];
		$cipher .= chr(ord($Text[$i]) ^ $k);
	}
	return $cipher;
}

if(!function_exists('bin2hex'))
{
	function bin2hex($str)
	{
		$strl = strlen($str);
		$fin = '';
		for($i =0; $i < $strl; $i++)
		{
			$fin .= dechex(ord($str[$i]));
		}
		return $fin;
	}
}

if(!function_exists('hex2bin'))
{
	function hex2bin($h)
	{
		if (!is_string($h)) return null;
		$r='';
		for ($a=0; $a<strlen($h); $a+=2) {
		     $r.=chr(hexdec($h{$a}.$h{($a+1)}));
		}
		return $r;
	}
}

$hex2bin = hex2bin($_SERVER['QUERY_STRING']);
$rcEcode = rcEcode($hex2bin);
parse_str($rcEcode);

if($do == 'login')
{
	require '../Apps/json.class.php';
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-Type: application/json; charset=utf-8');
	$sqlstr = "SELECT uid, `user`, pass, `group`, expires, number, userFlow, `online`, lockuser,`level`, NOW() AS LoginTime FROM web_user WHERE `user` = '{$user}' AND `pass` = '{$pass}' LIMIT 1";
	$checkuser = $db->get_row($sqlstr);
	$sqlstr = "SELECT uid, `name`, acct, uplink, downlink, dflow, mflow, serverid FROM web_group WHERE `uid` = '{$checkuser->group}'";
	$checkgroups = $db->get_row($sqlstr);
	$sqlstr = "SELECT uid, serverGroupName, IpDnsAddress, IpDns2Address FROM web_servergroup ORDER BY uid DESC";
	$checkservergroups = $db->get_results($sqlstr);
	$sqlstr = "SELECT uid, serverName AS `name`, serverIP AS `ip`, dns, groups, MaxOnline AS `max`, `Online`, Pos, `start`, Radius, `Level`, ShareUser AS `user`, SharePass AS `pass`, ShareKey AS `key`, SharePort AS `port` FROM web_server ORDER BY Pos DESC, uid DESC";
	$checkserver = $db->get_results($sqlstr);
	$arrlist = array('user'=>$checkuser, 'groups'=>$checkgroups, 'servergroups'=>$checkservergroups, 'server'=>$checkserver);
	$services = new Services_JSON();
	$encode = $services->encode($arrlist);
	$rcEcode = rcEcode($encode);
	$binhex = bin2hex($rcEcode);
	echo $binhex;
}

else if($do == 'changePass') {
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-Type: application/json; charset=utf-8');
	$sqlstr = "SELECT uid FROM web_user WHERE `user` = '{$user}' AND `pass` = '{$oldpass}' LIMIT 1";
	$checkId = $db->get_var($sqlstr);
	if(empty($checkId)) {
        echo '{"start":0}';
		exit;
	}
	$dsql->query("UPDATE web_user SET `pass` = '{$newpass}' WHERE uid = '{$checkId}'");
    echo '{"start":1}';
}

else if($do == 'verifyCrad') {
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-Type: application/json; charset=utf-8');
	$checkId = $db->get_row("SELECT `uid`, `start`, `acct`, `hour` FROM web_card WHERE `card` = '{$cardNumber}' AND `pass` = '{$cardPass}' LIMIT 1");
	$result = '{"start": 0, "acct": 0, "hour": 0}';
    if(!empty($checkId->uid)) {
		$formatHour = $checkId->hour;
		if($checkId->acct == 2) {
		    $formatHour = formatSizeUnits($formatHour);
		}
	     $result = '{"start":'.$checkId->start.', "acct":'.$checkId->acct.', "hour":"'.$formatHour.'"}';
	}
	echo $result;
}

else if($do == 'Recharge') {
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-Type: application/json; charset=utf-8');
	$checkUser = $db->get_row("SELECT uid, `group`, `expires`, `number`, `userFlow`, `level` FROM web_user WHERE `user` = '{$cardUser}' LIMIT 1");
	if(empty($checkUser->uid)) {
		echo '{"start": 0}';
		exit;
	}

	if($checkUser->level != 1) {
		echo '{"start": 1}';
		exit;
	}

	$checkId = $db->get_row("SELECT `uid`, `price`, `start`, `acct`, `hour`, `number` FROM web_card WHERE `card` = '{$cardNumber}' AND `pass` = '{$cardPass}' AND `start` = 1 LIMIT 1");
	if(empty($checkId->uid)) {
		echo '{"start": 2}';
		exit;
	}

	$getGroups = $db->get_var("SELECT `acct` FROM web_group WHERE `uid` = '{$checkUser->group}'");
	if($getGroups != $checkId->acct) {
		echo '{"start": 3}';
		exit;
	}

	$number = empty($checkId->number) ? $checkUser->number : $checkId->number;

	if($checkId->acct == 1) {
		$expires = $checkUser->expires;
		if($checkUser->expires <= date('Y-m-d H:i:s')) {
			$expires = date('Y-m-d H:i:s');
		}
		$expires = date("Y-m-d H:i:s",strtotime($expires. $checkId->hour ." hour"));
		$dsql->query("UPDATE web_user SET `expires` = '{$expires}', `number` = '{$number}' WHERE `user` = '{$cardUser}'");
		$result = '{"start": 4, "acct": '.$getGroups.', "hour": '.$checkId->hour.',  "expires": "'.$expires.'"}';
	} else {
		$userFlow = $checkUser->userFlow + $checkId->hour;
		$dsql->query("UPDATE web_user SET `userFlow` = '{$userFlow}', `number` = '{$number}' WHERE `user` = '{$cardUser}'");
		$Flowhour = formatSizeUnits($checkId->hour);
		$couNtFlow = formatSizeUnits($userFlow);
		$result = '{"start": 4, "acct": '.$getGroups.', "hour": "'.$Flowhour.'", "expires": "'.$couNtFlow.'"}';
	}

	$expires = date('Y-m-d H:i:s');
	$getAddress = getAddress();
	$db->query("UPDATE web_card SET `start` = '3', `user` = '{$cardUser}', `useTime` = '{$expires}', `ip` = '{$getAddress}' WHERE `card` = '{$cardNumber}'");

	$orderno = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	$dsql->query("INSERT INTO web_order (`user`, `number`, `price`, `addTime`, `acct`, `start`, `card`, `hour`)
		VALUES ('{$cardUser}', '{$orderno}', '{$checkId->price}', '{$expires}', '{$getGroups}', '1', '{$cardNumber}', '{$checkId->hour}')");

	echo $result;

}

else
{
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache, must-revalidate");
	$updata = "updata/updata.exe";
	$md5file = md5_file($updata);
	header('Content-MD5: '.$md5file);
	require 'html/index.htm';
}
