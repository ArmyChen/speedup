<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 13:15:28
  from "/var/www/html/Web/Admin/theme/online.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edf4f03d9561_40097521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d3505c44fe8a91878afa2ace3393b6995dab7ca' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/online.htm',
      1 => 1468754332,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edf4f03d9561_40097521 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=online">当前连接察看</a></li>
		</ul>
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form method="post" action="?do=online">
		    <input type="hidden" name="m" value="search">
			<label>账号：</label><input type="text" class="input length_3 mr10" name="UserName" value="<?php echo $_smarty_tpl->tpl_vars['UserName']->value;?>
">
			<label>服务器：</label><input type="text" class="input length_4 mr10" name="serverIP" value="<?php echo $_smarty_tpl->tpl_vars['serverIP']->value;?>
">
			<span class="mr5"></span>
			<button class="btn length_1">搜索</button>
			<span class="mr5"></span>
			<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=online'">重置</button>
		</form>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<form class="J_ajaxForm" action="#" method="post">
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
				    <td width="80"><label><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label></td>
					<td width="120">账号</td>
					<td>主机IP</td>
					<td>内网IP</td>
					<td>公网IP</td>
					<td>协议</td>
					<td>上行流量</td>
					<td>下行流量</td>
					<td>登录时间</td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->UserName;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->serverIP;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Intranet;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->PublicIp;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->LinkType;?>
</td>
				<td><span class="green"><?php echo getSizeUnits(array('flow'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Uplink),$_smarty_tpl);?>
</span></td>
				<td><span class="green"><?php echo getSizeUnits(array('flow'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Downlink),$_smarty_tpl);?>
</span></td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->onTime;?>
</td>
			</tr><?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
		</table>
		<?php echo $_smarty_tpl->tpl_vars['RetList']->value[1];?>

    </div>
	</form>
    <?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<a class="btn btn_submit" id="J_order_delLick_all" href="#">清理死链接</a>
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
	$('#J_order_delLick_all').on('click', function(e) {
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定一个账号! ');
			return;
		}
		Wind.dialog({
			message	: '该操作不可以恢复, 确定要清理选定账号死连接吗? ',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '?do=online&op=cmddelLick',
					success	 : function(data, statusText, xhr, $form) {
						Wind.dialog.alert('成功清理'+data.state+'个死链接账号.', function() {
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
