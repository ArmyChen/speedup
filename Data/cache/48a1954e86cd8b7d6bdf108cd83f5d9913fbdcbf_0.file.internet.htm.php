<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:33:49
  from "/var/www/html/Web/Admin/theme/internet.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb2d243033_61865471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48a1954e86cd8b7d6bdf108cd83f5d9913fbdcbf' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/internet.htm',
      1 => 1468565106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb2d243033_61865471 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=internet">网络工具</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ul>
			<li>该工具用于检测PPTP,或L2TP是否正常。</li>
		</ul>
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form method="post" action="#">
			<label>网络IP：</label><input type="text" class="input length_3 mr10" id="ip">
			<span class="mr5"></span>
			<button class="btn btn_submit length_2" id="ping_clear">检测</button>
			<span class="mr5"></span>
			<button class="btn length_2" type="button" onclick="javascript:window.location.href='?do=internet'">重置</button>
		</form>
	</div>
	<div class="h_a">检测结果</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<tr>
				<td><textarea class="length_5" id="input" style="width: 600px; height: 168px;" disabled></textarea>
			</tr>
		</table>
	</div>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
Wind.use('ajaxForm', 'dialog', function(){
	var clear = $('#ping_clear');
	clear.on('click', function(e) {
		var html = clear.html();
		e.preventDefault();
		Wind.dialog({
			type : 'confirm',
			isMask	: false,
			message : '该操作需要一定的时间, 你确定要检测吗? ',
			follow	: clear,
			onOk	: function() {
			    $("#input").val('');
	            clear.attr('disabled',"true").html(html +'中...');
				$.ajax({
					type:'Post',
					data:'op=send&ip='+$("#ip").val() ,
					cache:false,
					dataType:'html',
					success:function(data) {
						$("#input").val(data);
						clear.removeAttr("disabled").html(html);
					}, error:function(){
					    Wind.dialog.alert('网络异常请重新检测.... ');
						clear.removeAttr("disabled").html(html);
					},
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
