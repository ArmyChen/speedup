<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 13:07:54
  from "/var/www/html/Web/Admin/theme/email.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0962a241b96_71601171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54d03faec00f96d2dc518739e4326f93adfe90e5' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/email.htm',
      1 => 1468565088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0962a241b96_71601171 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="res/css/admin_style.css?v20141223" rel="stylesheet" />
<?php echo '<script'; ?>
>var GV={JS_ROOT:"res/js/dev/",JS_VERSION:"20141223",TOKEN:"bd588c67ec38e833",REGION_CONFIG:{},SCHOOL_CONFIG:{},URL:{LOGIN:"",IMAGE_RES:"res/images",REGION:"index.php?m=misc&c=webData&a=area",SCHOOL:"index.php?m=misc&c=webData&a=school"}};<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="res/js/dev/wind.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="res/js/dev/jquery.js?v20141223"><?php echo '</script'; ?>
>
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li class="current"><a href="?do=email">电子邮件设置</a></li>
			<li><a href="?do=email&a=send">电子邮件检测</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		目前只提供SMTP模式
	</div>
	<div class="h_a">电子邮件设置</div>
	<form class="J_ajaxForm" action="#" method="post">
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>邮件发送</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="mailOpen" value="1" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->mailOpen == 1) {?>checked<?php }?>><span>开启</span></label></li>
						<li><label><input type="radio" name="mailOpen" value="0" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->mailOpen == 0) {?>checked<?php }?>><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips">开启后可以给用户发送电子邮件。</div></td>
			</tr>
			<tr>
				<th>SMTP服务器</th>
				<td>
					<input type="text" class="input length_5" name="mailHost" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->mailHost;?>
">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>SMTP端口</th>
				<td>
					<input type="text" class="input length_5" name="mailPort" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->mailPort;?>
">
				</td>
				<td><div class="fun_tips">默认不需修改。</div></td>
			</tr>
			<tr>
				<th>发信人地址</th>
				<td>
					<input type="text" class="input length_5" name="mailFrom" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->mailFrom;?>
">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>SMTP用户身份验证</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="mailAuth" value="1" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->mailAuth == 1) {?>checked<?php }?>><span>开启</span></label></li>
						<li><label><input type="radio" name="mailAuth" value="0" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->mailAuth == 0) {?>checked<?php }?>><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips">如果SMTP服务器要求通过身份验证才可以发邮件，请选择"开启"。</div></td>
			</tr>
			<tr>
				<th>验证用户名</th>
				<td>
					<input type="text" class="input length_5" name="mailUser" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->mailUser;?>
">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>验证密码</th>
				<td>
					<input type="text" class="input length_5" name="mailPassword" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->mailPassword;?>
">
				</td>
				<td><div class="fun_tips">安全考虑，只显示密码的前后两位，中间显示八个 * 号。</div></td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<input type="hidden" name="op" value="cmdsave"/>
			<input type="hidden" name="m" value="email"/>
			<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
	</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
