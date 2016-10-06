<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:35:10
  from "/var/www/html/Web/Admin/theme/serverGroupedit.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb7e1ff390_41443634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3ce1cd99bce533c5af816d64b29e9d254e31370' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/serverGroupedit.htm',
      1 => 1468626215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb7e1ff390_41443634 (Smarty_Internal_Template $_smarty_tpl) {
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
		<li class="current"><a href="?do=serverGroup">服务器分组管理</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">基本信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>分组名称</th>
			<td><input name="serverGroupName" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->serverGroupName;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>IpDnsAddress</th>
			<td><input name="IpDnsAddress" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->IpDnsAddress;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>IpDns2Address</th>
			<td><input name="IpDns2Address" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->IpDns2Address;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>分组状态</th>
			<td>
				<ul class="switch_list cc">
					<li><label><input name="start" value="1" type="radio" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->start || $_smarty_tpl->tpl_vars['checkId']->value->start == 1) {?>checked<?php }?>><span>正常</span></label></li>
					<li><label><input name="start" value="2" type="radio" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 2) {?>checked<?php }?>><span>暂停</span></label></li>
				</ul>
			</td>
			<td><div class="fun_tips">分组状态,暂停之后客户端上将无法显示!</div></td>
		</tr>
	</table>
</div>
<div class="btn_wrap_pd">
    <input type="hidden" name="op" value="cmdsave"/>
    <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->uid;?>
"/>
	<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
	<button class="btn length_1" type="button" onclick="javascript:window.location.href='?do=serverGroup'">返回</button>
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
