<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:33:50
  from "/var/www/html/Web/Admin/theme/backup.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb2ea937b7_51829528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8af0b3eb75eaa2336f19ab88d121610ec9c9b3a8' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/backup.htm',
      1 => 1468488212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb2ea937b7_51829528 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=backup">数据库备份</a></li>
			<li><a href="#">数据库还原</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ul>
			<li>推荐使用mysqldump、phpmyadmin、navicat等专业的mysql工具来备份还原。</li>
		</ul>
	</div>
	<form action="#" method="post" class="J_ajaxForm" id="J_backup_form">
	<div class="h_a">数据表</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<tr>
				<th>数据表列表</th>
				<td>
					<div class="sql_list J_check_wrap">
						<dl>
							<dt>
								<span class="span_1"><label><input type="checkbox" class="J_check_all" data-checklist="J_check_x" data-direction="x" checked>全选</label></span>
								<span class="span_2">表名</span>
								<span class="span_3">说明</span>
								<span class="span_4">记录数</span>
								<span class="span_5">碎片</span>
							</dt>
							<dd>
							    <?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['RetList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?><p>
									<span class="span_1"><input type="checkbox" name="tabledb[]" value="<?php echo $_smarty_tpl->tpl_vars['RetList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Name;?>
" class="J_check" data-xid="J_check_x" checked="checked"></span>
									<span class="span_2"><?php echo $_smarty_tpl->tpl_vars['RetList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Name;?>
</span>
									<span class="span_3"><?php echo $_smarty_tpl->tpl_vars['RetList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Comment;?>
</span>
									<span class="span_4"><?php echo $_smarty_tpl->tpl_vars['RetList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Rows;?>
</span>
									<span class="span_5"><?php echo $_smarty_tpl->tpl_vars['RetList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->Data_free;?>
</span>
								</p><?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>
							</dd>
						</dl>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" type="submit" data-action="?do=backup&op=backup">备份</button>
			<button class="btn J_ajax_submit_btn" type="submit" data-action="?do=backup&op=repair">修复</button>
			<button class="btn J_ajax_submit_btn" type="submit" data-action="?do=backup&op=optimize">优化</button>
			<span id="J_backup_tip"></span>
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
