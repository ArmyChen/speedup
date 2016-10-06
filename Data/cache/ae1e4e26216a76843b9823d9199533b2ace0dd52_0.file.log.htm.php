<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 14:38:16
  from "/var/www/html/Web/Admin/theme/log.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f0ab5805e320_71512869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae1e4e26216a76843b9823d9199533b2ace0dd52' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/log.htm',
      1 => 1468730941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f0ab5805e320_71512869 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=log">系统日志</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>为了保证后台的安全性，系统只允许站点创始人删除日志</li>
			<li>只允许删除3个月前的日志</li>
		</ol>
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form method="post" action="?do=log">
		    <input type="hidden" name="m" value="search">
			<label>操作者：</label><input type="text" class="input length_3 mr10" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
			<label>操作日志：</label><input type="text" class="input length_3 mr10" name="open" value="<?php echo $_smarty_tpl->tpl_vars['open']->value;?>
">
			<button class="btn length_1">搜索</button>
			<span class="mr5"></span>
			<button class="btn btn_submit length_1" type="button" onclick="javascript:window.location.href='?do=log'">重置</button>
		</form>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['RetList']->value[0]) {?>
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="60">
				<col width="280">
				<col width="245">
			</colgroup>
			<thead>
				<tr>
					<td width="110">操作者</td>
					<td>操作IP</td>
					<td>操作日志</td>
					<td>操作系统</td>
					<td>浏览器</td>
					<td>操作时间</td>
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
				<td><?php echo getAdminName(array('uid'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->user),$_smarty_tpl);?>
</td>
				<td><?php echo getLogAddress(array('ip'=>$_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->ip),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->open;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->getPlatform;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->getBrowser;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RetList']->value[0][(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)]->addtime;?>
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
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<a class="btn" id="J_clear" href="?do=log&op=cmdDel">确定清除3个月前日志</a>
		</div>
    </div>
    <?php } else { ?><div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div><?php }?>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
Wind.use('ajaxForm', 'dialog', function(){
	var clear = $('#J_clear');
	clear.on('click', function(e){
		e.preventDefault();
		Wind.dialog({
			type : 'confirm',
			isMask	: false,
			message : '确认删除？',
			follow	: clear,
			onOk	: function() {
				clear.parent().find('span').remove();
				$.post(clear.attr('href'), {
					step : '2'
				}, function(data){
					if(data.state == 'success') {
						$( '<span class="tips_success">' + data.message + '</span>' ).appendTo(clear.parent()).fadeIn('slow').delay( 1000 ).fadeOut(function(){
							reloadPage(window);
						});
					}else if(data.state == 'fail'){
						$( '<span class="tips_error">' + data.message + '</span>' ).appendTo(clear.parent()).fadeIn( 'fast' );
					}
				}, 'json');
			}
		});
	});
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
