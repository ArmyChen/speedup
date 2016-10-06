<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 14:38:48
  from "/var/www/html/Web/Admin/theme/cradViewList.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0ab78db67b2_86535051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41b6ba58ff6d56d94c00480fcacb8c9d89e0681b' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/cradViewList.htm',
      1 => 1468730503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0ab78db67b2_86535051 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=cardView">充值卡详情</a></li>
		</ul>
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form method="post" action="?do=cardView">
		    <input type="hidden" name="m" value="search">
			<label>卡号：</label><input type="text" class="input length_3 mr10" name="card" value="<?php echo $_smarty_tpl->tpl_vars['card']->value;?>
">
			<label>账号：</label><input type="text" class="input length_2 mr10" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
			<span class="mr5"></span>
			<button class="btn length_1">搜索</button>
			<span class="mr5"></span>
			<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=cardView'">重置</button>
		</form>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<form class="J_ajaxForm" action="#" method="post">
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="160">
				<col width="100">
				<col width="128">
			</colgroup>
			<thead>
				<tr>
					<td>卡号</td>
					<td>卡密</td>
					<td>单价</td>
					<td>数量</td>
					<td>计费方式</td>
					<td>时长/流量</td>
					<td>充值账号</td>
					<td>充值时间</td>
					<td>备注</td>
					<td>IP</td>
				</tr>
			</thead>
			<?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['RetList']->value[0]) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->card;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->pass;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->price;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->number;?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->acct == 1) {?>常规计费<?php } else { ?><span class="green">流量计费</span><?php }?></td>
				<td><?php echo getcardType(array('uid'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->user;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->useTime;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->profile;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->ip;?>
</td>
			</tr><?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
			<tr>
				<td></td>
				<td>本页合计</td>
				<td><span class="red"><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
</span></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr><?php if ($_smarty_tpl->tpl_vars['RetList']->value[1]) {?>
			<tr>
				<td></td>
				<td>全部合计</td>
				<td><span class="red"><?php echo $_smarty_tpl->tpl_vars['checkId']->value;?>
</span></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr><?php }?>
		</table>
		<?php echo $_smarty_tpl->tpl_vars['RetList']->value[1];?>

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
	$('#J_card_del_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一张点卡! ');
			return;
		}
		Wind.dialog({
			message	: '该操作不可以恢复, 确定要删除选定的充值卡吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=crad&op=cmdDel',
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
	$('#J_card_stop_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一张点卡! ');
			return;
		}
		Wind.dialog({
			message	: '该操作不可以恢复, 确定要冻结选定的充值卡吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=crad&op=cmdStop',
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
	$('#J_card_normal_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一张点卡! ');
			return;
		}
		Wind.dialog({
			message	: '该操作不可以恢复, 确定要解除冻结选定的充值卡吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=crad&op=cmdNormal',
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
	$('#J_card_save_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一张点卡! ');
			return;
		}
		Wind.dialog({
			message	: '确定要导出充值卡吗? ',
			type	: 'confirm',
			onOk	: function() {
			    $('#J_card_save_all').html('导出中..');
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=crad&op=cmdSaveText',
					success	 : function(data, statusText, xhr, $form) {
						if(data.state === 'success') {
							var location = window.location;
							location.href = location.pathname + location.search + '&op=openText';
						} else {
							Wind.dialog.alert(data.message);
						}
						$('#J_card_save_all').html('导出点卡');
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
