<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$tpl->assign('UserName', $_SESSION['authadmin_name']);
$tpl->display('index.htm');