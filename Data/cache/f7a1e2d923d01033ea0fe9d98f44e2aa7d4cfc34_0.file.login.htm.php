<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:33:27
  from "/var/www/html/Web/Admin/theme/login.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb17769e64_98615427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7a1e2d923d01033ea0fe9d98f44e2aa7d4cfc34' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/login.htm',
      1 => 1466745527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb17769e64_98615427 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>登录后台</title>
 	<link rel="stylesheet" href="res/bootstrap.css" />
	<link rel="stylesheet" href="res/bootstrap-responsive.css" />
	<link rel="stylesheet" href="res/login.css" />
	<?php echo '<script'; ?>
 src="res/js/dev/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="res/login.js"><?php echo '</script'; ?>
>
</head>
<body class='login'>
	<div class="wrapper">
		<div class="login-body">
			<h2>后台管理</h2>
			<form action="?do=login" method='post' class='form-validate'>
				<div class="control-group">
					<div class="email controls">
						<input id="username" type="text" name="username" value="" placeholder="账号" class='input-block-level' required />
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" id="password" name="password" placeholder="密码" class='input-block-level' required />
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="code" class="input-block-level code" name="code" required/>
						<img src="verify.php" id="code"/>
						<a href="javascript:void(change_code());">看不清</a>
					</div>
				</div>
				<div class="submit">
					<input style="padding: 8px 15px;" type="submit" value="登录" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget" style="margin-top: 20px;">
				<a href="../" target="_blank"><span>官方网站</span></a>
			</div>
		</div>
	</div>
</body>
</html><?php }
}
