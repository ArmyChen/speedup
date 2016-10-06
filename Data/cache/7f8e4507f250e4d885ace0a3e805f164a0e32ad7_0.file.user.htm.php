<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 13:27:36
  from "/var/www/html/Web/Admin/theme/user.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edf7c8449f70_54609462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f8e4507f250e4d885ace0a3e805f164a0e32ad7' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/user.htm',
      1 => 1468749176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edf7c8449f70_54609462 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=user">账号管理</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>账号支持模糊搜索。账号输入“a” 则检索出所有以a开头的账号。</li>
			<li>可以对用户的基本信息、连接信息、用户组，以及账号状态进行管理。</li>
		</ol>
	</div>
	<div class="mb10">
		<a class="btn" href="?do=user&op=cmdEdit" title="添加账号" role="button"><span class="add"></span>添加账号</a>
		<span class="mr5"></span>
		<a class="btn" href="#" id="J_user_del_all" title="删除" >删除</a>
		<a class="btn" id="J_user_emptyip_all" href="?do=user" title="清空IP">清空IP</a>
		<a class="btn" id="J_user_expired_all" href="?do=user" title="清理过期账号">清理过期账号</a>
		<span class="mr5"></span>
		<a class="btn" href="#" id="J_user_addFlow_all" title="增加账号流量">增加流量</a>
		<a class="btn" href="#" id="J_user_addTime_all" title="增加账号时间">续期</a>
		<a class="btn" href="#" id="J_user_group_all" title="转组">转组</a>
		<span class="mr5"></span>
		<a class="btn" href="#" id="J_user_stop_all"  title="暂停">暂停</a>
		<a class="btn" href="#" id="J_user_restore_all"  title="恢复">恢复</a>
	</div>
	<div class="h_a">搜索</div>
	<form method="post" action="?do=user">
	<input type="hidden" name="m" value="search">
	<div class="search_type cc mb10">
	<table width="100%">
		<tr>
			<td width="10%" align="left" nowrap scope="row">帐号<br>
				<input name="username" type="text" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" class="input length_3"/>
			</td>
			<td width="10%" align="left">用户组<br>
				<select name="group" id="group" class="length_3">
				<option value="">--- </option>
				<?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['groupList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" <?php if ($_smarty_tpl->tpl_vars['group']->value == $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->name;?>
 (<?php if ($_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->acct == 1) {?>根据时间计费<?php } else { ?>根据流量计费<?php }?>)</option>
				<?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
				</select>
			</td>
			<td width="7%" align="left">计费方式<br>
				<select name="acct" onchange="submit()">
					<option value='' selected>---</option>
					<option value='routine' <?php if ($_smarty_tpl->tpl_vars['acct']->value == 'routine') {?>selected<?php }?>>常规计费</option>
					<option value='flow' <?php if ($_smarty_tpl->tpl_vars['acct']->value == 'flow') {?>selected<?php }?>>流量计费</option>
				</select>
			</td>
			<td width="10%" align="left">状态<br>
				<select name="status" onchange="submit()">
					<option value='' selected>---</option>
					<option value='normal' <?php if ($_smarty_tpl->tpl_vars['status']->value == 'normal') {?>selected<?php }?>>正常用户</option>
					<option value='stoped' <?php if ($_smarty_tpl->tpl_vars['status']->value == 'stoped') {?>selected<?php }?>>已暂停</option>
					<option value='online' <?php if ($_smarty_tpl->tpl_vars['status']->value == 'online') {?>selected<?php }?>>当前在线用户</option>
				</select>
			</td>
			<td width="10%" height="30">到期时间<br>
				<select name="expires" onchange="submit()">
				<option value='' >---</option>
					<option value='24' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 24) {?>selected<?php }?>>24小时内到期</option>
					<option value='72' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 72) {?>selected<?php }?>>三日内到期</option>
					<option value='168' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 168) {?>selected<?php }?>>一周内到期</option>
					<option value='360' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 360) {?>selected<?php }?>>半月内到期</option>
					<option value='720' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 720) {?>selected<?php }?>>一月内到期</option>
					<option value='expire' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 'expire') {?>selected<?php }?>>已过期用户</option>
					<option value='flow' <?php if ($_smarty_tpl->tpl_vars['expires']->value == 'flow') {?>selected<?php }?>>流量已用完用户</option>
				</select>
			</td>
			<td width="10%" align="left" nowrap scope="row">客户名称<br>
				<input name="realname" type="text" value="<?php echo $_smarty_tpl->tpl_vars['realname']->value;?>
" class="input length_2"/>
			</td>
			<td width="10%" align="left" nowrap scope="row">备注<br>
				<input name="profile" type="text" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value;?>
" class="input length_2"/>
			</td>
			<td width="22%">
				<br>
				<span class="mr5"></span>
				<button class="btn length_1">搜索</button>
				<span class="mr5"></span>
				<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=user'">重置</button>
			</td>
		</tr>
	</table>
	</div>
	</form>
	<form class="J_ajaxForm" action="#" method="post" ><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="100"><label><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label></td>
					<td width="100">账号</td>
					<td width="100">密码</td>
					<td>用户组</td>
					<td>数量</td>
					<td>在线</td>
					<td>计费方式</td>
					<td>流量/时间</td>
					<td>状态</td>
					<td width="135">操作</td>
				</tr>
			</thead>
			<?php
$__section_loop_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['RetList']->value[0]) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_1_total = $__section_loop_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_1_total != 0) {
for ($__section_loop_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_1_iteration <= $__section_loop_1_total; $__section_loop_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
			<tr>
			    <td><input class="J_check" data-xid="J_check_x" data-yid="J_check_y" type="checkbox" id="aid" name="aid[]" value="<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->user;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->pass;?>
</td>
				<td><?php echo getUserGroupName(array('group'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->group),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->number;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->online;?>
</td>
				<td><?php echo getUserGroupType(array('group'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->group),$_smarty_tpl);?>
</td>
				<td><?php echo getuserAcct(array('uid'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid),$_smarty_tpl);?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->lockuser == 1) {?>正常<?php } else { ?><span class="red">暂停</span><?php }?></td>
				<td>
					<a class="btn btn_submit" href="?do=user&op=cmdEdit&uid=<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" title="编辑">[编辑]</a>
					<span class="mr5"></span>
					<a href="?do=user&op=cmdDel" class="btn J_ajax_del" data-pdata="{'user': '<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->user;?>
'}">[删除]</a>
				</td>
			</tr><?php
}
}
if ($__section_loop_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_1_saved;
}
?>
		</table>
		<?php echo $_smarty_tpl->tpl_vars['RetList']->value[1];?>

    </div>
    <?php } else { ?>
		<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div><?php }?>
	</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
Wind.use('dialog',function() {
	$('#J_user_del_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号');
			return;
		}
		Wind.dialog({
			message	: '该操作不可恢复, 确定要删除选定的账号吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=user&op=doBatchDelete',
					success	 : function(data, statusText, xhr, $form) {
						if(data.state == 'success') {
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

	var clear = $('#J_user_emptyip_all');
	clear.on('click', function(e){
		e.preventDefault();
		Wind.dialog({
			type : 'confirm',
			isMask	: false,
			message : '该操作不可恢复, 确定要回收账号已分配IP吗? ',
			onOk	: function() {
				$.post(clear.attr('href'), {
					op : 'doRecoverIp'
				}, function(data){
					Wind.dialog.alert('成功回收'+data.state+'个IP.', function() {
						var location = window.location;
						location.href = location.pathname + location.search;
					});
				}, 'json');
			}
		});
	});
	var clear = $('#J_user_expired_all');
	clear.on('click', function(e){
		e.preventDefault();
		Wind.dialog({
			type : 'confirm',
			isMask	: false,
			message : '该操作不可恢复, 确定要删除已过期账号吗? ',
			onOk	: function() {
				$.post(clear.attr('href'), {
					op : 'doBatchDel'
				}, function(data){
					Wind.dialog.alert('成功删除'+data.state+'个账号.', function() {
						var location = window.location;
						location.href = location.pathname + location.search;
					});
				}, 'json');
			}
		});
	});
	
	$('#J_user_addFlow_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号');
			return;
		}
		Wind.dialog({
			message	: '该操作不可恢复, 确定要给选定的账号增加1GB流量吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=user&op=doAddFlow',
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功增加'+data.state+'个账号流量.', function() {
							var location = window.location;
							location.href = location.pathname + location.search;
						});
					}
				});
			}
		});
	});
	
	$('#J_user_addTime_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号');
			return;
		}
		Wind.dialog({
			message	: '该操作不可恢复, 确定要给选定的账号增加一个月吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=user&op=doAddTime',
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功增加'+data.state+'个账号一个月时间.', function() {
							var location = window.location;
							location.href = location.pathname + location.search;
						});
					}
				});
			}
		});
	});
	$('#J_user_group_all').on('click', function(e) {
		e.preventDefault();
	     var clear = $('#group');
		if(!clear.val()) {
			Wind.dialog.alert('请选定一个用户组', function() {
				clear.focus(); 
			});
			return;
		}
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号');
			return;
		}
		Wind.dialog({
			message	: '警告：该操作不可恢复<br>转换将重置该账号剩余时间以及流量<br>确定要强制转换用户组吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=user&op=doUpUserGroup&group='+clear.val(),
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功转换'+data.state+'个账号属性.', function() {
							var location = window.location;
							location.href = location.pathname + location.search;
						});
					}
				});
			}
		});
	});
	$('#J_user_stop_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号');
			return;
		}
		Wind.dialog({
			message	: '警告：该操作不可恢复, 确定要停止选定账号吗<br>停止后该账号将无法进行拨号认证 ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=user&op=doStopUser',
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功冻结'+data.state+'个账号.', function() {
							var location = window.location;
							location.href = location.pathname + location.search;
						});
					}
				});
			}
		});
	});
	$('#J_user_restore_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号');
			return;
		}
		Wind.dialog({
			message	: '该操作不可恢复, 确定要恢复选定账号吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=user&op=doRestoreUser',
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功恢复'+data.state+'个账号.', function() {
							var location = window.location;
							location.href = location.pathname + location.search;
						});
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
