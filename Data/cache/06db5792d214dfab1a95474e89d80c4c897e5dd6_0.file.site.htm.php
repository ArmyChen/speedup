<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 14:49:32
  from "/var/www/html/Web/Admin/theme/site.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57ee0afc710fe8_35223587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06db5792d214dfab1a95474e89d80c4c897e5dd6' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/site.htm',
      1 => 1469176141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ee0afc710fe8_35223587 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=site">全局设置</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		全局参数,请谨慎删除！
	</div>
	<div class="mb10"><a class="btn" href="?do=site&op=cmdEdit" title="新增参数" role="button"><span class="add"></span>新增参数</a></div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form method="post" action="?do=site">
		    <input type="hidden" name="m" value="search">
			<label>参数：</label><input type="text" class="input length_3 mr10" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
			<button class="btn length_1">搜索</button>
			<span class="mr5"></span>
			<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=site'">重置</button>
		</form>
	</div>
	<form class="J_ajaxForm" action="#" method="post" ><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="60">
				<col width="200">
				<col width="300">
			</colgroup>
			<thead>
				<tr>
					<td width="100">UID</td>
					<td>参数</td>
					<td>值</td>
					<td>类别</td>
					<td>状态</td>
					<td>操作</td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->parameter;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->value;?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->type == 1) {?>全局参数<?php } else { ?><span class="red">客户端参数</span><?php }?></td>
				<td><?php if ($_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->start == 1) {?>正常<?php } else { ?><span class="red">关闭</span><?php }?></td>
				<td>
					<a class="btn btn_submit" href="?do=site&op=cmdEdit&uid=<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
" title="编辑">[编辑]</a>
					<span class="mr5"></span>
					<a href="?do=site&op=cmdDel" class="btn J_ajax_del" data-pdata="{'uid': '<?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->uid;?>
'}">[删除]</a>
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
    <?php } else { ?>
		<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div><?php }?>
	</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
