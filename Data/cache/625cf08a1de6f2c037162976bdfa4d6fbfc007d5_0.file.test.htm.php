<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 14:38:26
  from "/var/www/html/Web/Admin/theme/test.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0ab62725651_45408819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '625cf08a1de6f2c037162976bdfa4d6fbfc007d5' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/test.htm',
      1 => 1468714426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0ab62725651_45408819 (Smarty_Internal_Template $_smarty_tpl) {
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
		<li class="current"><a href="?do=test">测试账号</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">基本信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>账号名称</th>
			<td><input name="user" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->user;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>账号密码</th>
			<td>
				<input name="pass" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->pass;?>
">
				<td></td>
			</td>
		</tr>
		<tr>
			<th>连接数量</th>
			<td>
				<input name="number" type="text" class="input length_4" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->number;?>
">
				<td></td>
			</td>
		</tr>
		<tr>
			<th>中断时间</th>
			<td>
				<input name="online" type="text" class="input length_4" value="<?php echo $_smarty_tpl->tpl_vars['online']->value;?>
">
				<td></td>
			</td>
		</tr>
		<tr>
			<th>状态</th>
			<td>
				<ul class="switch_list cc">
					<li><label><input name="lockuser" value="1" type="radio" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->lockuser || $_smarty_tpl->tpl_vars['checkId']->value->lockuser == 1) {?>checked<?php }?>><span>正常</span></label></li>
					<li><label><input name="lockuser" value="2" type="radio" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->lockuser == 2) {?>checked<?php }?>><span>暂停</span></label></li>
				</ul>
			</td>
			<td><div id="J_status_tip" class="fun_tips"></div></td>
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
