<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 14:38:27
  from "/var/www/html/Web/Admin/theme/order.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0ab63757766_62955122',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d191c85c908d6100dafbf9e7eac17a4d3a42d6f' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/order.htm',
      1 => 1468750382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0ab63757766_62955122 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=order">订单管理</a></li>
		</ul>
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form method="post" action="?do=order">
		    <input type="hidden" name="m" value="search">
			<label>账号：</label><input type="text" class="input length_3 mr10" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
			<label>订单号：</label><input type="text" class="input length_4 mr10" name="number" value="<?php echo $_smarty_tpl->tpl_vars['number']->value;?>
">
			<span class="mr5"></span>
			<button class="btn length_1">搜索</button>
			<span class="mr5"></span>
			<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=order'">重置</button>
		</form>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>撤销订单将清除该订单用户所增加流量,以及使用时间。</li>
		</ol>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<form class="J_ajaxForm" action="#" method="post">
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
				    <td width="80"><label><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label></td>
					<td width="150">账号</td>
					<td width="180">订单号</td>
					<td width="75">单价</td>
					<td width="140">创建时间</td>
					<td width="80">类别</td>
					<td width="120">时长/流量</td>
					<td width="130">支付卡号</td>
					<td width="65">状态</td>
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
			    <td><input class="J_check" data-xid="J_check_x" data-yid="J_check_y" type="checkbox" id="aid" name="aid[]" value="<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->user;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->number;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->price;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->addTime;?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->acct == 1) {?>常规<?php } else { ?><span class="green">流量</span><?php }?></td>
				<td><?php echo getorderType(array('uid'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->card;?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->start == 1) {?>
					已开通<?php } elseif ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->start == 2) {?>
					<span class="blue">已撤销</span><?php } else { ?>
					<span class="s6">未开通</span><?php }?>
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
				<td></td>
				<td>本页合计</td>
				<td><span class="red"><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
</span></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['RetList']->value[1]) {?>
			<tr>
				<td></td>
				<td></td>
				<td>全部合计</td>
				<td><span class="red"><?php echo $_smarty_tpl->tpl_vars['checkId']->value;?>
</span></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr><?php }?>
		</table>
		<?php echo $_smarty_tpl->tpl_vars['RetList']->value[1];?>

    </div>
	</form>
    <?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<a class="btn btn_submit" id="J_order_cx_all" href="#">撤销订单</a>
			<a class="btn" id="J_order_del_all" href="#">删除订单</a>
		</div>
    </div><?php }?>
    <?php } else { ?>
	<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div><?php }?>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
Wind.use('dialog',function() {
	$('#J_order_cx_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个订单! ');
			return;
		}
		Wind.dialog({
			message	: '该操作不可以恢复, 确定要撤销选定的订单吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=order&op=cmdcheXiao',
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功撤销'+data.state+'个订单.', function() {
							var location = window.location;
							location.href = location.pathname + location.search;
						});
					}
				});
			}
		});
	});
	$('#J_order_del_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个订单! ');
			return;
		}
		Wind.dialog({
			message	: '该操作不可以恢复, 确定要删除选定的订单吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=order&op=cmdDel',
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
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
