<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:34:08
  from "/var/www/html/Web/Admin/theme/server.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb40531139_20460232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e46524b1d63871c44cf767053328d1936057d23' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/server.htm',
      1 => 1468814233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb40531139_20460232 (Smarty_Internal_Template $_smarty_tpl) {
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
<div class="wrap J_check_wrap">
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
	<form method="post" action="?do=server">
	<input type="hidden" name="m" value="search">
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<table width="100%">
			<tr>
				<td width="10%" align="left" nowrap scope="row">
					标题</br>
					<input name="serverName" class="input length_2" type="text" id="title" value="<?php echo $_smarty_tpl->tpl_vars['serverName']->value;?>
"/>
				</td>
				<td width="10%" align="left" nowrap scope="row">
					主机/IP</br>
					<input name="serverIP" class="input length_2" type="text" id="title" value="<?php echo $_smarty_tpl->tpl_vars['serverIP']->value;?>
"/>
				</td>
				<td width="10%" align="left" nowrap scope="row">
					服务器组</br>
					<select class="select_3" name="groups">
						<option value="" selected="selected">---</option><?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['GroupList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" <?php if ($_smarty_tpl->tpl_vars['groups']->value == $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverGroupName;?>
</option><?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
					</select>
				</td>
				<td width="10%" align="left" nowrap scope="row">
					状态</br>
					<select class="select_2" name="start">
						<option value="" selected>---</option>
						<option value="1" <?php if ($_smarty_tpl->tpl_vars['start']->value == 1) {?>selected<?php }?>>正常</option>
						<option value="2" <?php if ($_smarty_tpl->tpl_vars['start']->value == 2) {?>selected<?php }?>>检修</option>
						<option value="3" <?php if ($_smarty_tpl->tpl_vars['start']->value == 3) {?>selected<?php }?>>已满</option>
					</select>
				</td>
				<td width="10%" align="left" nowrap scope="row">
					 认证方式<br>
					<select class="select_2" name="Radius">
						<option value='' selected>---</option>
						<option value='1' <?php if ($_smarty_tpl->tpl_vars['Radius']->value == 1) {?>selected<?php }?>>使用Radius认证</option>
						<option value='2' <?php if ($_smarty_tpl->tpl_vars['Radius']->value == 2) {?>selected<?php }?>>非Radius认证</option>
					</select>
				</td>
				<td width="10%" align="left" nowrap scope="row">备注<br>
					<input name="Profile" type="text" class="input input_hd length_2" value="<?php echo $_smarty_tpl->tpl_vars['Profile']->value;?>
">
				</td>
				<td width="8%" align="left" nowrap scope="row">
					 是否有人在线<br>
					<select name="Online">
						<option value='' selected>---</option>
						<option value='1' <?php if ($_smarty_tpl->tpl_vars['Online']->value == 1) {?>selected<?php }?>>有人在线</option>
						<option value='2' <?php if ($_smarty_tpl->tpl_vars['Online']->value == 2) {?>selected<?php }?>>无人在线</option>
					</select>
				</td>
				<td width="4%" align="left" nowrap scope="row">
					 DNS<br>
					<select name="isdns">
						<option value='' selected>---</option>
						<option value='1' <?php if ($_smarty_tpl->tpl_vars['isdns']->value == 1) {?>selected<?php }?>>使用</option>
						<option value='2' <?php if ($_smarty_tpl->tpl_vars['isdns']->value == 2) {?>selected<?php }?>>不使用</option>
					</select>
				</td>
				<td width="20%">
					<br>
					<span class="mr5"></span>
					<button class="btn length_1">搜索</button>
					<span class="mr5"></span>
					<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=server'">重置</button>
				</td>
			</tr>
		</table>
	</div>
	</form>
	<?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<form class="J_ajaxForm" action="#" method="post">
	<div class="h_a">数据维护</div>
	<div class="search_type cc mb10">
	<table width="100%">
		<tr>
			<td nowrap>
				 更改分组<br>
				<select class="select_2" name="groups">
					<option value="" selected="selected">---</option><?php
$__section_loop_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['GroupList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_1_total = $__section_loop_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_1_total != 0) {
for ($__section_loop_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_1_iteration <= $__section_loop_1_total; $__section_loop_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
"><?php echo $_smarty_tpl->tpl_vars['GroupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverGroupName;?>
</option><?php
}
}
if ($__section_loop_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_1_saved;
}
?>
				</select>
			</td>
			<td nowrap>
				 认证方式<br>
				<select class="select_2" name="Radius">
					<option value=''>---</option>
					<option value='1' >使用Radius认证</option>
					<option value='2' >非Radius认证</option>
				</select>
			</td>
			<td nowrap>
				 更改状态<br>
				<select class="select_2" name="start">
					<option value=''>---</option>
					<option value="1">正常</option>
					<option value="2">检修</option>
					<option value="3">已满</option>
				</select>
			</td>
			<td nowrap>
				 更改级别<br>
				<select class="select_2" name="Level">
					<option value=''>---</option>
					<option value='1'>正式服务器</option>
					<option value='2'>测试服务器</option>
				</select>
			</td>
			<td nowrap>
				 更改位置<br>
				<input name="Pos" type="text" class="input length_1" value="">
			</td>
			<td nowrap>
				 主机/IP<br>
				<input name="serverIP" type="text" class="input length_2" value="">
			</td>
			<td nowrap>
				 共享帐号<br>
				<input name="ShareUser" type="text" class="input length_2" value="">
			</td>
			<td nowrap>
				 共享密码<br>
				<input name="SharePass" type="text" class="input length_2" value="">
			</td>
			<td nowrap>
				通信KEY<br>
				<input name="ShareKey" type="text" class="input length_2" value="">
			</td>
			<td width="12%"></td>
		</tr>
	</table>
	</div>
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
				    <td><label><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label></td>
					<td width="60">UID</td>
					<td>服务器名称</td>
					<td>服务器IP</td>
					<td>服务器分组</td>
					<td>位置</td>
					<td>最大</td>
					<td>在线</td>
					<td>状态</td>
					<td>Dns</td>
					<td>Radius</td>
					<td>级别</td>
					<td width="120">操作</td>
				</tr>
			</thead>
			<?php
$__section_loop_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['RetList']->value[0]) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_2_total = $__section_loop_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_2_total != 0) {
for ($__section_loop_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_2_iteration <= $__section_loop_2_total; $__section_loop_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
			<tr>
			    <td><input class="J_check" data-xid="J_check_x" data-yid="J_check_y" type="checkbox" id="aid" name="aid[]" value="<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverName;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverIP;?>
</td>
				<td><?php echo getGroupName(array('gid'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->groups),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Pos;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->MaxOnline;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Online;?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->start == 1) {?>正常<?php } elseif ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->start == 2) {?><span class="gray"><b>检修</b></span><?php } else { ?><span class="red">已满</span><?php }?></td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->dns == 1) {?>使用<?php } else { ?><span class="gray">默认</span><?php }?></td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Radius == 1) {?>Radius<?php } else { ?><span class="red">System</span><?php }?></td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Level == 1) {?>正式<?php } else { ?><span class="red">免费</span><?php }?></td>
				<td>
					<a class="btn btn_submit" href="?do=server&op=cmdEdit&uid=<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" title="编辑">[编辑]</a>
					<span class="mr5"></span>
					<a href="?do=server&op=cmdDel" class="btn J_ajax_del" data-pdata="{'uid': '<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
'}">[删除]</a>
				</td>
			</tr><?php
}
}
if ($__section_loop_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_2_saved;
}
?>
		</table>
		<?php echo $_smarty_tpl->tpl_vars['RetList']->value[1];?>

		<div class="p10"></div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<label class="mr20"><input type="checkbox" name="checkAll" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</label>
				<button data-action="?do=server&op=doUPData" type="submit" class="btn mr10 btn_submit J_ajax_submit_btn">批量更改</button>
				<button type="button" id="J_server_del_all" class="btn">删除</button>
			</div>
		</div>
    </div></form>
    <?php } else { ?>
	<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div><?php }?>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
Wind.use('dialog',function() {
	$('#J_server_copy_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个服务器! ');
			return;
		}
		Wind.dialog({
			message	: '确定要复制选定的服务器? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=server&op=doCopy',
					success	 : function(data, statusText, xhr, $form) {
						if(data.state === 'success') {
							var location = window.location;
							location.href = location.pathname + location.search;
						}else{
							Wind.dialog.alert(data.message);
						}
					}
				});
			}
		});
	});

	$('#J_server_del_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个服务器');
			return;
		}
		Wind.dialog({
			message	: '该操作不可恢复, 确定要删除选定的服务器? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=server&op=doBatchDelete',
					success	 : function(data, statusText, xhr, $form) {
						if(data.state === 'success') {
							var location = window.location;
							location.href = location.pathname + location.search;
						}else{
							Wind.dialog.alert(data.message);
						}
					}
				});
			}
		});
	});
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
