<?php
/* Smarty version 3.1.30-dev/59, created on 2016-09-30 12:33:44
  from "/var/www/html/Web/Admin/theme/index.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57edeb28dbd7d6_46971603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cefea25ab72b3ca67fd2f87be01d7210fbc89b68' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/index.htm',
      1 => 1468754524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57edeb28dbd7d6_46971603 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>系统后台</title>
	<link href="res/css/admin_layout.css?v20141223" rel="stylesheet" />
	<?php echo '<script'; ?>
 type="text/javascript">if(window.top!==window.self){document.write='';window.top.location.href=window.self.location.href;setTimeout(function(){document.body.innerHTML='';},0);} var GV={JS_ROOT:"res/js/dev/",JS_VERSION:"20141223", TOKEN:"bd588c67ec38e833", REGION_CONFIG:{},SCHOOL_CONFIG:{},URL:{LOGIN:'',IMAGE_RES:'res/images',REGION:'?m=misc&c=webData&a=area',SCHOOL:'?m=misc&c=webData&a=school'}};<?php echo '</script'; ?>
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
	<noscript><h1 class="noscript">您已禁用脚本，这样会导致页面不可用，请启用脚本后刷新页面</h1></noscript>
	<table width="100%" height="100%" style="table-layout:fixed;">
		<tr class="head">
			<th><a href="index.php" class="logo">管理中心</a></th>
			<td>
			<div class="nav">
				<ul id="J_B_main_block">
				</ul>
			</div>
			<div class="login_info">
				<button class="cache" id="cache_submit_btn" type="button">更新缓存</button>
				<a href="../" class="home" target="_blank">前台首页</a>
				<span class="mr10">管理员： <?php echo $_smarty_tpl->tpl_vars['UserName']->value;?>
</span>
				<a href="?do=logout" class="mr10">[注销]</a>
			</div></td>
		</tr>
		<tr class="tab">
			<th>
			<div class="search">
				<input size="15" placeholder="Hi，华企软件！" id="J_search_keyword" type="text">
				<button type="button" name="keyword" id="J_search" value="" data-url="?do=home">搜索</button>
			</div></th>
			<td>
			<div id="B_tabA" class="tabA">
				<a href="" tabindex="-1" class="tabA_pre" id="J_prev" title="上一页">上一页</a>
				<a href="" tabindex="-1" class="tabA_next" id="J_next" title="下一页">下一页</a>
				<div style="margin:0 25px;min-height:1px;">
					<div style="position:relative;height:30px;width:100%;overflow:hidden;">
						<ul id="B_history" style="white-space:nowrap;position:absolute;left:0;top:0;">
							<li class="current" data-id="default" tabindex="0"><span><a>后台首页</a></span></li>
						</ul>
					</div>
				</div>
			</div></td>
		</tr>
		<tr class="content">
			<th style="overflow:hidden; border-right:1px solid #DEDEDE; ">
				<div id="B_menunav">
					<div class="menubar">
						<dl id="B_menubar">
							<dt class="disabled"></dt>
						</dl>
					</div>
					<div id="menu_next" class="menuNext" style="display:none;">
						<a href="#" class="pre" title="顶部超出，点击向下滚动">向下滚动</a>
						<a href="#" class="next" title="高度超出，点击向上滚动">向上滚动</a>
					</div>
				</div>
			</th>
			<td id="B_frame">
				<div id="breadCrumb" style="display:none;">
					首页<em>&gt;</em>功能<em>&gt;</em>功能
				</div>
				<div class="options">
					<a href="#" class="refresh" id="J_refresh" title="刷新">刷新</a>
					<a href="#" id="J_fullScreen" class="full_screen" title="全屏">全屏</a>
				</div>
				<div class="loading" id="loading">加载中...</div>
				<iframe id="iframe_default" src="?do=home" style="height: 100%; width: 100%;display:none;" data-id="default" frameborder="0" scrolling="auto"></iframe>
			</td>
		</tr>
	</table>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="res/js/dev/layer/layer.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="res/js/dev/index.js?v20141223"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
