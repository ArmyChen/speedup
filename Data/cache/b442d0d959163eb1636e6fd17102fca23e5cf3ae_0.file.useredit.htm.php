<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-03 13:49:17
  from "/var/www/html/Web/Admin/theme/useredit.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f1f15dd3d3b6_54959092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b442d0d959163eb1636e6fd17102fca23e5cf3ae' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/useredit.htm',
      1 => 1468719534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f1f15dd3d3b6_54959092 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php echo '<script'; ?>
 src="res/js/dev/layer/layer.js?v20141223"><?php echo '</script'; ?>
>
</head>
<body>
<div class="wrap">
<div class="nav">
	<ul class="cc">
		<li class="current"><a href="?do=user">账号管理</a></li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="#">
<div class="h_a">基本信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>账号</th>
			<td><input name="user" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->user;?>
" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->uid) {?>disabled<?php }?>></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>密码</th>
			<td>
				<input name="pass" id="pass" type="text" class="input length_3" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->pass;?>
">
				<span class="mr5"></span>
				<a class="btn" href="#" onclick="javascript:clickPass();"title="随机密码">随机密码</a>
			</td>
			<td><span class="red">(用来登录的密码，至少6位)</span></td>
			<td></td>
		</tr>
		<tr>
			<th>所属用户组</th>
			<td>
				<select id="group" name="group" style="width: 300px; height: 68px;" multiple="multiple" onchange="groupBox()">
					<?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['groupList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->group == $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->name;?>
 (<?php if ($_smarty_tpl->tpl_vars['groupList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->acct == 1) {?>时间计费<?php } else { ?>流量计费<?php }?>)</option>
					<?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
				</select>
			</td>
			<td>(必须选定用户组)</td>
			<td></td>
		</tr>
		<tr>
			<th>连接数量</th>
			<td><input name="number" type="text" class="input length_2" value="<?php if ($_smarty_tpl->tpl_vars['checkId']->value->uid) {
echo $_smarty_tpl->tpl_vars['checkId']->value->number;
} else { ?>1<?php }?>"></td>
			<td>(同一账号可同时连接的电脑数量)</td>
			<td></td>
		</tr>
		<tr id="showExpires" style="display:none;">
			<th>过期时间</th>
			<td>
				<input name="expires" id="expires" type="text" class="input length_3 J_datetime date" value="<?php if ($_smarty_tpl->tpl_vars['checkId']->value->uid) {
echo $_smarty_tpl->tpl_vars['checkId']->value->expires;
} else {
echo $_smarty_tpl->tpl_vars['addTime']->value;
}?>">
			</td>
			<td><span class="red">(过期时间,默认为当前时间增加一个月)</span></td>
			<td></td>
		</tr>
		<tr id="showFlow" style="display:none;" >
			<th>账号流量(MB)</th>
			<td>
				<input name="userFlow" id="userFlow" type="text" class="input input_hd length_3" value="<?php echo $_smarty_tpl->tpl_vars['userFlow']->value;?>
">
			</td>
			<td><span class="red">(流量单位为MB, 比如1为1MB)</span></td>
			<td></td>
		</tr>
		<tr>
			<th>账号状态</th>
			<td>
				<ul class="switch_list cc">
					<li><label><input name="lockuser" value="1" type="radio" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->lockuser || $_smarty_tpl->tpl_vars['checkId']->value->lockuser == 1) {?>checked<?php }?>><span>正常</span></label></li>
					<li><label><input name="lockuser" value="2" type="radio" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->lockuser == 2) {?>checked<?php }?>><span>暂停</span></label></li>
				</ul>
			</td>
			<td><div class="fun_tips">账号状态,暂停之后将无法进行登录!</div></td>
			<td></td>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['checkId']->value->uid) {?>
		<tr>
			<th>注册时间</th>
			<td><?php echo $_smarty_tpl->tpl_vars['checkId']->value->regTime;?>
</td>
			<th>注册IP地址</th>
			<td><?php if ($_smarty_tpl->tpl_vars['checkId']->value->regIp) {
echo $_smarty_tpl->tpl_vars['checkId']->value->regIp;
} else { ?>127.0.0.1<?php }?></td>
		</tr>
		<tr>
			<th>当前在线状态</th>
			<td><img id="J_face_img" class="J_avatar" src="res/images/<?php if ($_smarty_tpl->tpl_vars['checkId']->value->online == 0) {?>Offline<?php } else { ?>Online<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['checkId']->value->online == 0) {?>该用当前离线<?php } else { ?>该用户当前在线<?php }?>">
			<span class="mr5"></span>在线终端<span class="green"><b><?php echo $_smarty_tpl->tpl_vars['checkId']->value->online;?>
</b></span>个</td>
			<th>最后登录时间</th>
			<td><?php echo $_smarty_tpl->tpl_vars['Login']->value;?>
</td>
		</tr>
		<?php }?>
	</table>
</div>
<div class="h_a">高级信息</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>允许登录IP</th>
			<td><input name="allowip" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->allowip;?>
"></td>
			<td>(限制该账号只能从指定公网IP或IP段登录，例如220.220.220.*)</td>
		</tr>
		<tr>
			<th>固定IP</th>
			<td><input name="fixedip" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->fixedip;?>
"></td>
			<td>(给用户分配固定IP地址)</td>
		</tr>
		<tr>
			<th>锁定电脑</th>
			<td>
				<select name='lockbrain' title='锁定用户到固定电脑' style='width:230px;'>
					<option value='1' <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->lockbrain || $_smarty_tpl->tpl_vars['checkId']->value->lockbrain == 1) {?>selected="selected"<?php }?>>不锁定</option>
					<option value='2' <?php if ($_smarty_tpl->tpl_vars['checkId']->value->lockbrain == 2) {?>selected="selected"<?php }?>>锁定</option>
				</select>
			</td>
			<td><div class="fun_tips">锁定电脑,锁定之后只允许指定电脑登录!</div></td>
		</tr>
	</table>
</div>
<div class="h_a">联系信息</div>
<div class="table_full" >
	<table width="100%">
		<col class="th" />
		<col/>
		<tr>
			<th>客户名称</th>
			<td><input name="realname" type="text" class="input input_hd length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->realname;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>QQ</th>
			<td><input name="qq" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->qq;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>邮箱</th>
			<td><input name="email" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->email;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>联系电话</th>
			<td><input name="phone" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->phone;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>联系地址</th>
			<td><input name="address" type="text" class="input length_5" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->address;?>
"></td>
			<td></td>
		</tr>
		<tr>
			<th>备注</th>
			<td>
				<textarea class="length_5" name="profile"><?php echo $_smarty_tpl->tpl_vars['checkId']->value->profile;?>
</textarea>
			</td>
			<td></td>
		</tr>
	</table>
</div>
<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<input type="hidden" name="op" value="cmdsave"/>
		<input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->uid;?>
"/>
		<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
		<button class="btn length_1" type="button" onclick="javascript:window.location.href='?do=user'">返回</button>
	</div>
</div>
</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
groupBox();

function groupBox() {
    var Index = $('#group option:selected').get(0).value;
	if(Index != '') {
        snedBox(Index);
	}
}

function snedBox(i) {
	$.ajax({
		url:"?do=user&op=checkGroup",
		async:false,
		data:'group='+i,
		dataType: "json",
		success:function(result) {
			if(result.acct == 1) {
				document.getElementById('showExpires').style.display="";
				document.getElementById('showFlow').style.display="none";
			}else{
				document.getElementById('showExpires').style.display="none";
				document.getElementById('showFlow').style.display="";
			}
		}, error: function() {
			layer.alert('链接到服务器异常,请刷新页面重试! ', function(index){
				var location = window.location;
				location.href = location.pathname + location.search;
				layer.close(index);
			});
		}
	});
}

function clickPass() {
	var rand = '';
	for(var i=0;i<6;i++) {
		rand += Math.floor(Math.random()*10);
	}
	document.getElementById('pass').value= rand;
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
