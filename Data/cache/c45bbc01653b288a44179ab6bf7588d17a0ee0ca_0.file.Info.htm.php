<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 14:51:31
  from "/var/www/html/Web/Admin/theme/Info.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0ae73a1d238_03567689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c45bbc01653b288a44179ab6bf7588d17a0ee0ca' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/Info.htm',
      1 => 1468594854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0ae73a1d238_03567689 (Smarty_Internal_Template $_smarty_tpl) {
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
		<li class="current"><a href="?do=Info">修改我的资料</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
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
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
