<?php

/**
 * Example Application
 *
 * @package Example-application
 */

// 提示消息
function ShowMsg($error = 'success', $msg = '操作成功!')
{
	if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest"){
		echo '{"referer":"","refresh":false,"state":"'.$error.'","data":"","html":"","message":["'.$msg.'"],"__error":""}';
	} else {
		$html = '<!doctype html><html><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><title>信息提示</title><link href="res/css/admin_style.css" rel="stylesheet" /></head><body><div class="wrap"><div id="error_tips"><h2>信息提示</h2><div class="error_cont"><ul><li>'.$msg.'</li></ul><div class="error_return"><a href="javascript:window.history.go(-1);" class="btn">确定</a></div></div></div></div></body></html>';
	    echo $html;
	}
    exit(0);
}

// 调试输出
function debug($log) {
	file_put_contents('log.txt', $log);
}

// 删除文件
function rmdir_all($dir) {
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while ($file = readdir($dh)) {
				$Filedel = $dir.'/'.$file;
				@chmod($Filedel, 0777);
				@unlink($Filedel);
			}
			closedir($dh);
		}
	}
	@file_put_contents($dir.'/index.htm', 'Access Denied');
}

// 创建目录
function mkdir_all($dirname) {
    if( !is_dir($dirname) ) {
        if(!mkdir_all(dirname($dirname)) ) {
            return false;
        }
        if( !mkdir($dirname,0777) ) {
            return false;
        }
    }
    return true;
}

// 查询IP地址
function checkAddress($ipAddr)
{
	require_once '../Apps/Address.class.php';
	$NewAddress = new Address();
	$Address = $NewAddress->ipaddrs($ipAddr);
	$Address = $ipAddr . '=>' . $Address['country']. $Address['area'];
	$Address = str_replace('局域网对方和您在同一内部网', '本地网络', $Address);
	$Address = str_replace('IANA保留地址用于本地回送', '本地网络', $Address);
	$Address = str_replace('IANA保留地址用于多点传送', '本地网络', $Address);
	unset($NewAddress);
	return $Address;
}

function getAdminName ($params) {
	global $dsql;
	$checkId = $dsql->get_var("SELECT name FROM web_admin WHERE `uid` = '{$params['uid']}'");
	return $checkId;
}

function getLogAddress ($params) {
	$Address = checkAddress($params['ip']);
    return $Address;
}

function getGroupList () {
	global $dsql;
	$sqlstr = "SELECT uid, serverGroupName FROM web_servergroup WHERE `start` = 1 ORDER BY uid DESC";
	$Retlist = $dsql->get_results($sqlstr);
	return $Retlist;
}

function getGroupName ($params) {
	global $dsql;
	$checkId = $dsql->get_var("SELECT serverGroupName FROM web_servergroup WHERE `uid` = '{$params['gid']}'");
	return $checkId;
}

function getUserGroupName ($params) {
	global $dsql;
	$checkId = $dsql->get_var("SELECT `name` FROM web_group WHERE `uid` = '{$params['group']}'");
	return $checkId;
}

function getcardType ($params) {
	global $dsql;
	$results = '';
	$checkId = $dsql->get_row("SELECT `uid`, `acct`, `hour` FROM web_card WHERE `uid` = '{$params['uid']}'");
	$results = number_format($checkId->hour, 2);
	if($checkId->acct == 2) {
		$results = formatSizeUnits($checkId->hour);
	}
	return $results;
}

function getorderType ($params) {
	global $dsql;
	$results = '';
    $checkId = $dsql->get_row("SELECT `acct`, `hour` FROM web_order WHERE `uid` = '{$params['uid']}'");
	$results = number_format($checkId->hour, 2);
	if($checkId->acct == 2) {
		$results = formatSizeUnits($checkId->hour);
	}
	return $results;
}

function getUserGroupType ($params) {
	global $dsql;
	$checkId = $dsql->get_var("SELECT `acct` FROM web_group WHERE `uid` = '{$params['group']}'");
	if($checkId == 1) {
		$checkId = '常规计费';
		return $checkId;
	}
	$checkId = '<span class="green">流量计费</span>';
	return $checkId;
}

function getuserAcct ($params) {
	global $dsql;
	$checkId = $dsql->get_row("SELECT `group`, `userFlow`, `expires` FROM web_user WHERE `uid` = '{$params['uid']}'");
	$getGroup = $dsql->get_var("SELECT `acct` FROM web_group WHERE `uid` = '{$checkId->group}'");
	if($getGroup == 1) {
		if($checkId->expires >= '2036-00-00 00:00:00'){
			
			$checkId = '<span class="red"><b>永不过期</b></span>';
			return $checkId;
		}
		$checkId = strtotime($checkId->expires);
		$checkId  = @ceil(($checkId - time()) / 86400);
		if($checkId > 0) {
			$checkId = $checkId.'天';
			return $checkId;
		}
		$checkId = '<span class="gray">过期</span>';
	    return $checkId;
	}
	$checkId = formatSizeUnits($checkId->userFlow);
	return $checkId;
}

function getSizeUnits ($params) {
	$checkId = formatSizeUnits($params['flow']);
	return $checkId;
}

function adminPage ($Table, $Where = null, $Page, $url, $Order = 'uid', $Show = 20) {
	global $db;
	$init = 1;
	$Number = 7;
	$offset = $Show * ($Page - 1);
	$sqlstr = "SELECT COUNT(uid) FROM $Table $Where";
	$count = $db->get_var($sqlstr);
	$pages = $ceil = @ceil($count / $Show);
	$sqlstr = "SELECT * FROM $Table $Where ORDER BY $Order DESC LIMIT $offset, $Show";
	$Retlist = $db->get_results($sqlstr);
	$Number = ($Number % 2 ) ? $Number:$Pagelen + 1;
	$Pageoffset = ($Number-1)/2;
	$html = '<div class="p10"><div class="pages">';
	if( $Page != 1 ) {
		$html.= "<a href=\"$url=1\">&laquo; 首页</a>";
		$html.= "<a href=\"$url=".($Page-1)."\" class=\"Pages_pre J_Pages_pre\">&laquo; 上一页</a>";
	}
	if( $pages > $Number ) {
		if( $Page <= $Pageoffset ){
			$init = 1;
			$ceil = $Number;
		} else {
			if($Page + $Pageoffset >= $pages+1) {
				$init = $pages-$Number+1;
			} else {
				$init = $Page-$Pageoffset;
				$ceil = $Page+$Pageoffset;
			}
		}
	}
	for( $i=$init;$i<=$ceil;$i++ ) {
		if($i == $Page){
		    $html .= "<strong>$i</strong>";
		} else {
		    $html .= "<a href=\"$url=$i\">$i</a>";
		}
	}
	if( $Page != $pages ) {
		$html.= "<a href=\"$url=".($Page+1)."\" class=\"Pages_next J_Pages_next\">下一页 &raquo;</a> ";
		$html.= "<a href=\"$url=$pages\">尾页 &raquo;</a>";
	}
	$html .= '</div></div>';
	if($Show >= $count){
	    $html = NULL;
	}
	$array = array($Retlist, $html);
	return $array;
}

function getuserOnline24 ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT `Uplink` + `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}' and onTime >=  NOW() - interval 1 day";

	$checkId = $dsql->get_var($sql);

	$checkId = formatGSizeUnits($checkId);
	return $checkId;
}

function getuserOnline24updown ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT Uplink FROM web_online WHERE `UserName` = '{$params['user']}' and onTime >=  NOW() - interval 1 day";

	$uplink = $dsql->get_var($sql);
	$sql2 = "SELECT Downlink FROM web_online WHERE `UserName` = '{$params['user']}' and onTime >=  NOW() - interval 1 day";

	$downlink = $dsql->get_var($sql2);

	$uplink = formatGSizeUnits($uplink);
	$downlink = formatGSizeUnits($downlink);
	
	return $uplink."/".$downlink;
}

function getuserOnline30 ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT `Uplink` + `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}' and  onTime >=  NOW()-interval 30 day";

	$checkId = $dsql->get_var($sql);

	$checkId = formatGSizeUnits($checkId);
	return $checkId;
}

function getuserOnline30updown ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT Uplink FROM web_online WHERE `UserName` = '{$params['user']}' and  onTime >=  NOW()-interval 30 day";

	$uplink = $dsql->get_var($sql);
	$sql2 = "SELECT Downlink FROM web_online WHERE `UserName` = '{$params['user']}' and  onTime >=  NOW()-interval 30 day";

	$downlink = $dsql->get_var($sql2);

	$uplink = formatGSizeUnits($uplink);
	$downlink = formatGSizeUnits($downlink);
	
	return $uplink."/".$downlink;
}

function getserverOnline24 ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT `Uplink` + `Downlink` FROM web_online WHERE `serverIP` = '{$params['serverIP']}' and onTime >=  NOW() - interval 1 day";

	$checkId = $dsql->get_var($sql);

	$checkId = formatGSizeUnits($checkId);
	return $checkId;
}

function getserverOnline24updown ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT Uplink FROM web_online WHERE `serverIP` = '{$params['serverIP']}' and onTime >=  NOW() - interval 1 day";

	$uplink = $dsql->get_var($sql);
	$sql2 = "SELECT Downlink FROM web_online WHERE `serverIP` = '{$params['serverIP']}' and onTime >=  NOW() - interval 1 day";

	$downlink = $dsql->get_var($sql2);

	$uplink = formatGSizeUnits($uplink);
	$downlink = formatGSizeUnits($downlink);
	
	return $uplink."/".$downlink;
}

function getserverOnline30 ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT `Uplink` + `Downlink` FROM web_online WHERE `serverIP` = '{$params['serverIP']}' and  onTime >=  NOW() -interval 30 day";

	$checkId = $dsql->get_var($sql);

	$checkId = formatGSizeUnits($checkId);
	return $checkId;
}

function getserverOnline30updown ($params) {
	global $dsql;
	//$checkId = $dsql->get_row("SELECT `onTime`, `offTime`, `Uplink`, `Downlink` FROM web_online WHERE `UserName` = '{$params['user']}'");
	$sql = "SELECT Uplink FROM web_online WHERE `serverIP` = '{$params['serverIP']}' and  onTime >=  NOW()-interval 30 day";

	$uplink = $dsql->get_var($sql);
	$sql2 = "SELECT Downlink FROM web_online WHERE `serverIP` = '{$params['serverIP']}' and  onTime >=  NOW()-interval 30 day";

	$downlink = $dsql->get_var($sql2);

	$uplink = formatGSizeUnits($uplink);
	$downlink = formatGSizeUnits($downlink);
	
	return $uplink."/".$downlink;
}