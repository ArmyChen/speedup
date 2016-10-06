<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-03 13:07:53
  from "/var/www/html/Web/Admin/theme/siteedit.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f1e7a9251e39_29471691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cd976f7d037f5f8b74d982f345b24f5ffe2e63b' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/siteedit.htm',
      1 => 1468626293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f1e7a9251e39_29471691 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="res/css/admin_style.css?v20141223" rel="stylesheet" />
<?php echo '<script'; ?>
>var GV={JS_ROOT:"res/js/dev/",JS_VERSION:"20141223", TOKEN:"bd588c67ec38e833", REGION_CONFIG:{},SCHOOL_CONFIG:{},URL:{LOGIN:"",IMAGE_RES:"res/images",REGION:"index.php?m=misc&c=webData&a=area",SCHOOL:"index.php?m=misc&c=webData&a=school"}};<?php echo '</script'; ?>
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
		<li class="current"><a href="?do=site">全局设置</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">站点信息设置</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>参数</th>
			<td>
				<input name="parameter" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->parameter;?>
" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->uid) {?>disabled<?php }?>>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>类别</th>
			<td>
				<select class="select_5" name="type">
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 1) {?>selected="selected"<?php }?>>全局参数</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 2) {?>selected="selected"<?php }?>>客户端参数</option>
				</select>
			</td>
			<td><div class="fun_tips">系统默认时间显示。会员可在前台设置中心进行调整</div></td>
		</tr>
		<tr>
			<th>值</th>
			<td>
				<textarea class="length_5" name="value"><?php echo $_smarty_tpl->tpl_vars['checkId']->value->value;?>
</textarea>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>状态</th>
			<td>
				<ul class="switch_list cc">
					<li><label><input name="start" value="1" type="radio" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->start || $_smarty_tpl->tpl_vars['checkId']->value->start == 1) {?>checked<?php }?>><span>开启</span></label></li>
					<li><label><input name="start" value="2" type="radio" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 2) {?>checked<?php }?>><span>关闭</span></label></li>
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
    <button class="btn length_1" type="button" onclick="javascript:window.location.href='?do=site'">返回</button>
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
