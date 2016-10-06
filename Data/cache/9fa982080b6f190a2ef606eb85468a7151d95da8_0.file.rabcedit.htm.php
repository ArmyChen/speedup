<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 13:07:56
  from "/var/www/html/Web/Admin/theme/rabcedit.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0962ce352a4_36878019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fa982080b6f190a2ef606eb85468a7151d95da8' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/rabcedit.htm',
      1 => 1468750687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0962ce352a4_36878019 (Smarty_Internal_Template $_smarty_tpl) {
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
		<li class="current"><a href="?do=rabc">后台账号</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">用户信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>用户名</th>
			<td><input name="name" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->name;?>
" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->uid) {?>disabled<?php }?>></td>
			<td></td>
		</tr>
		<tr>
			<th>新密码</th>
			<td><input name="pass" type="text" class="input length_5"></td>
			<td></td>
		</tr>
		<tr>
			<th>确认密码</th>
			<td><input name="repass" type="text" class="input length_5"></td>
			<td><span class="red">密码不修改请留空!</span></td>
		</tr>
		<tr>
			<th>账号状态</th>
			<td>
				<ul class="switch_list cc">
					<li><label><input name="start" value="1" type="radio" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->start || $_smarty_tpl->tpl_vars['checkId']->value->start == 1) {?>checked<?php }?>><span>正常</span></label></li>
					<li><label><input name="start" value="2" type="radio" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 2) {?>checked<?php }?>><span>暂停登录</span></label></li>
				</ul>
			</td>
			<td><div class="fun_tips">账号状态,暂停之后将无法进行登录!</div></td>
		</tr>
	</table>
</div>
<div class="h_a">联系信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>真实姓名</th>
			<td><input name="realname" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->realname;?>
"></td>
		</tr>
		<tr>
			<th>电子邮箱</th>
			<td>
				<input name="email" type="email" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->email;?>
">
			</td>
		</tr>
		<tr>
			<th>联络电话</th>
			<td>
				<input name="aliww" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->aliww;?>
">
			</td>
		</tr>
		<tr>
			<th>QQ</th>
			<td>
				<input name="qq" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->qq;?>
">
			</td>
		</tr>
		<tr>
			<th>备注</th>
			<td>
				<textarea class="length_5" name="profile"><?php echo $_smarty_tpl->tpl_vars['checkId']->value->profile;?>
</textarea>
			</td>
		</tr>

	</table>
</div>
<div class="btn_wrap_pd">
    <input type="hidden" name="op" value="cmdsave"/>
    <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->uid;?>
"/>
	<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
    <button class="btn length_1" type="button" onclick="javascript:window.location.href='?do=rabc'">返回</button>
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
