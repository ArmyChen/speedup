<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:34:25
  from "/var/www/html/Web/Admin/theme/serveredit.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb513381b9_27606431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b81ed7830ce062d5560ada9cccf9c6d7d93f50e' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/serveredit.htm',
      1 => 1468825886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb513381b9_27606431 (Smarty_Internal_Template $_smarty_tpl) {
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
		<li class="current"><a href="?do=server">服务器管理</a></li>
	</ul>
</div>
<div class="mb10">
	<a class="btn" href="?do=server&op=cmdEdit" title="添加服务器" role="button"><span class="add"></span>添加服务器</a>
	<span class="mr5"></span>
	<a class="btn" href="#" id="J_server_copy_all" title="节点复制" role="button">节点复制</a>
	<span class="mr5"></span>
	<a class="btn" href="?do=server&op=serverImport" title="批量导入" role="button">批量导入</a>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">基本信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>服务器名称</th>
			<td><input name="serverName" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->serverName;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>服务器IP</th>
			<td>
				<input name="serverIP" type="text" class="input input_hd" style="width:240px;" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->serverIP;?>
">
				<label><input type="checkbox" name="isdns" value="1" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->dns == 1) {?>checked<?php }?>><span>启用DNS</span></label>
			</td>
			<td></td>
		</tr>
		<tr>
			<th>服务器分组</th>
			<td>
				<select class="select_4" name="groups">
					<option value="" selected="selected">---</option><?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['GroupList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->groups == $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverGroupName;?>
</option><?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
				</select>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>最大在线</th>
			<td><input name="MaxOnline" type="text" class="input input_hd length_2" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->MaxOnline;?>
"></td>
			<td><span class="red">该服务器最大支持人数, 超出将无法登录。!</span></td>
		</tr>
		<tr>
			<th>位置</th>
			<td><input name="Pos" type="text" class="input input_hd length_2" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->Pos;?>
"></td>
			<td><span class="red">位置数值越大, 排在客户端前面!</span></td>
		</tr>
		<tr>
			<th>服务器状态</th>
			<td>
				<select class="select_2" name="start">
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 1) {?>selected="selected"<?php }?>>正常</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 2) {?>selected="selected"<?php }?>>检修</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->start == 3) {?>selected="selected"<?php }?>>已满</option>
				</select>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>Radius认证</th>
			<td>
				<select class="select_3" name="Radius">
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->Radius == 1) {?>selected="selected"<?php }?>>此服务器使用Radius认证</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->Radius == 2) {?>selected="selected"<?php }?>>非Radius认证</option>
				</select>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>服务器级别</th>
			<td>
				<ul class="switch_list cc J_radio_change">
					<li><label><input name="Level" value="1" type="radio" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->Level || $_smarty_tpl->tpl_vars['checkId']->value->Level == 1) {?>checked<?php }?>><span>正式服务器</span></label></li>
					<li><label><input name="Level" value="2" type="radio" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->Level == 2) {?>checked<?php }?>><span>测试服务器</span></label></li>
				</ul>	
			</td>
			<td>
			<div class="fun_tips"><span class="red">测试服务器, 使用将不进行计费!</span></div>
			</td>
		</tr>
	</table>
</div>
<div class="h_a">账号信息</div>
<div class="table_full" id="level1" class="J_radio_change_items">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>共享账号</th>
			<td><input name="ShareUser" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->ShareUser;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>共享密码</th>
			<td><input name="SharePass" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->SharePass;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>通信KEY</th>
			<td><input name="ShareKey" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->ShareKey;?>
"></td>
			<td><span class="red">该KEY为L2TP密码。</span></td>
		</tr>
		<tr>
			<th>通信端口</th>
			<td><input name="SharePort" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->SharePort;?>
"></td>
			<td><span class="red">该端口为OEPNVPN通信端口。</span></td>
		</tr>
		<tr>
			<th>备注</th>
			<td>
				<textarea class="length_5" name="Profile"><?php echo $_smarty_tpl->tpl_vars['checkId']->value->Profile;?>
</textarea>
				<td></td>
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
		<button class="btn length_1" type="button" onclick="javascript:window.location.href='?do=server'">返回</button>
	</div>
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
