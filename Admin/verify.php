<?php

/**
 * Example Application
 *
 * @package Example-application
 */

require_once ("../Apps/captcha.class.php");
$savePath = "../Data/session";
session_save_path($savePath);
@ini_set('session.gc_probability', 1);
session_start();
$captcha = new captcha();
$captcha->doimg();
$_SESSION['authadmin_session'] = $captcha->getCode();