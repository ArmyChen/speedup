<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-01 15:03:13
  from "/var/www/html/Web/Admin/theme/groupedit.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57ef5fb1e4ba73_26391599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a7afac9b1a14b40937ad4abce2b83c28c6b925e' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/groupedit.htm',
      1 => 1468714837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ef5fb1e4ba73_26391599 (Smarty_Internal_Template $_smarty_tpl) {
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
<style>
.fieldset {border:1px solid #72A8CF; padding:10px; margin-left: 2px; width:760px; margin-bottom:10px;}
.fieldset .label{display:inline-block; width:245px; margin-bottom:6px;}
</style>
</head>
<body>
<div class="wrap">
<div class="nav">
	<ul class="cc">
		<li class="current"><a href="?do=group">用户组管理</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">基本信息</div>
<div class="table_full">
	<table width="100%" class="J_check_wrap">
		<col class="th" />
		<col/>
		<tr>
			<th>用户组名称</th>
			<td><input name="name" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->name;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>计费类型</th>
			<td>
				<select name='acct' style="width: 300px; height: 68px;" multiple="multiple" onchange="acctBox()">
					<option value='1' <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->acct || $_smarty_tpl->tpl_vars['checkId']->value->acct == 1) {?>selected<?php }?>>常规(时间计费)</option>
					<option value='2' <?php if ($_smarty_tpl->tpl_vars['checkId']->value->acct == 2) {?>selected<?php }?>>流量(流量计费)</option>
				</select>
			</td>
			<td></td>
		</tr>
		<tr>
			<th>上行宽带(KB/s)</th>
			<td><input name="uplink" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['format_uplink']->value;?>
"></td>
			<td><span class="red">(该参数只对ROS有效)</span></td>
		</tr>
		<tr>
			<th>下行宽带(KB/s)</th>
			<td><input name="downlink" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['format_downlink']->value;?>
"></td>
			<td><span class="red">(该参数只对ROS有效)</span></td>
		</tr>
		<tr>
			<th>日流量限制(MB)</th>
			<td><input name="dflow" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['format_dflow']->value;?>
"></td>
			<td><span class="red">(单位为MB,比如1为1MB)</span></td>
		</tr>
		<tr>
			<th>月流量限制(MB)</th>
			<td><input name="mflow" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['format_mflow']->value;?>
"></td>
			<td><span class="red">(单位为MB,比如1为1MB)</span></td>
		</tr>
		<tr>
		    <th>允许登录的服务器</th>
			<td>
				<label>
				    <input type="checkbox" <?php if (count($_smarty_tpl->tpl_vars['dataList']->value) == $_smarty_tpl->tpl_vars['keyword']->value && $_smarty_tpl->tpl_vars['keyword']->value) {?>checked="checked"<?php }?> onclick="checkbox(this, 'serverid[]')" />
					<span>&nbsp;选中全部</span>
				</label>
				<div style="height: 12px;"></div>
				<?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['groupList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
					<?php if (count($_smarty_tpl->tpl_vars['serverList']->value[$_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid])) {?>
					<fieldset class="fieldset">
						<legend><?php echo $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverGroupName;?>
</legend>
						<div id="checkbox_div_servergroupids">
							<?php
$__section_list_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_list']) ? $_smarty_tpl->tpl_vars['__smarty_section_list'] : false;
$__section_list_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['serverList']->value[$_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid]) ? count($_loop) : max(0, (int) $_loop));
$__section_list_1_total = $__section_list_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_1_total != 0) {
for ($__section_list_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_1_iteration <= $__section_list_1_total; $__section_list_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
							<label class="label">
								<input type="checkbox" name="serverid[]" <?php if (in_array($_smarty_tpl->tpl_vars['serverList']->value[$_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid][(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]->uid,$_smarty_tpl->tpl_vars['dataList']->value)) {?> checked="checked" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['serverList']->value[$_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid][(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]->uid;?>
"/>
								<span>&nbsp; <?php echo $_smarty_tpl->tpl_vars['serverList']->value[$_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid][(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]->serverName;?>
</span>
							</label>
							<?php
}
}
if ($__section_list_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_list'] = $__section_list_1_saved;
}
?>
						</div>
					</fieldset>
					<?php }?>
				<?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
			</td>
		</tr>
	</table>
</div>
<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<input type="hidden" name="op" value="cmdsave"/>
		<input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->uid;?>
"/>
		<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
		<button class="btn length_1" type="button" onclick="javascript:window.location.href='?do=group'">返回</button>
	</div>
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>function checkbox(a,m){var i,n=document.getElementsByName(m);for(i=0;i<n.length;i++){n[i].checked=a.checked;}}<?php echo '</script'; ?>
>
</body>
</html><?php }
}
