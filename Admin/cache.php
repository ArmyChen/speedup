<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');

$dir = '../Data/cache';
rmdir_all ($dir);

$dir = '../Data/session';
rmdir_all ($dir);

$dir = '../Data/client';
rmdir_all ($dir);

ShowMsg();