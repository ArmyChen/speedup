<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

require '../Apps/Browser.php';
$browser = new Browser();
$getBrowser = $browser->getBrowser().' '.$browser->getVersion();
$getPlatform = $browser->getPlatform();
$getAddress = getAddress();
$db->query("INSERT INTO web_log (user, ip, addtime, `open`, `getBrowser`, `getPlatform`)
	VALUES ('{$_SESSION['authadmin_uid']}', '{$getAddress}', NOW(), '登出系统后台..', '{$getBrowser}', '{$getPlatform}')");

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

unset($browser, $getBrowser, $getPlatform, $getAddress);

ShowMsg(null, '您已经成功退出,欢迎您再次使用!');