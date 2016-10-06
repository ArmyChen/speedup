<?php

/**
 * Example Application
 *
 * @package Example-application
 */

!defined('IN_RAD') && exit('Access Denied');
if($op == 'default')
{
	$tpl->assign('keyword', $keyword);
	unset($keyword);
	$tpl->display('internet.htm');
}

if($op == 'send')
{
	$result = checkPPTP ($ip);
	echo $result;
}

// 检测PPTP服务
function checkPPTP ($address)
{
	$data = '00 9C 00 01 1A 2B 3C 4D 00 01 00 00 01 00 00 00 00 00 00 01 00 00 00 01 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 4D 69 63 72 6F 73 6F 66 74 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00';
	$buffer = explode(' ', $data);
	$socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	@socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array("sec"=>2, "usec"=>0 ));
	@socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array("sec"=>4, "usec"=>0 ));
	$result = '检测'.$address.',PPTP服务异常.';
	if (@socket_connect($socket, $address, 1723))
	{
		for ($i = 0; $i < 156; $i++)
		{
			@socket_write($socket, chr(@hexdec($buffer[$i])));
		}
		$receive = @socket_read($socket, 2048, PHP_BINARY_READ);
		$receive = @bin2hex($receive);
		$receive = @substr($receive, 0, 10);
		if($receive == '009c00011a')
		{
		    $result = '检测'.$address.',PPTP服务正常.';
		}
	}
	@socket_close($socket);
    return $result;
}