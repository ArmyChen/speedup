<?php
/* Smarty version 3.1.30-dev/59, created on 2016-10-02 13:08:54
  from "/var/www/html/Web/Admin/theme/regist.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57f09666075ff3_24332651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8dfff9a715715ee4ae2ee37c1a998f1eaca6156' => 
    array (
      0 => '/var/www/html/Web/Admin/theme/regist.htm',
      1 => 1470500425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f09666075ff3_24332651 (Smarty_Internal_Template $_smarty_tpl) {
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
			<li class="current"><a href="?do=regist">注册设置</a></li>
			<li><a href="?do=openuser">订单设置</a></li>
		</ul>
	</div>
	<div class="h_a">注册设置</div>
	<form method="post" class="J_ajaxForm" action="#">
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>注册发送邮件</th>
				<td>
					<ul class="switch_list cc J_radio_change">
						<li><label><input name="regMail" value="1" type="radio" data-arr="reg2" <?php if (!$_smarty_tpl->tpl_vars['checkId']->value->regMail || $_smarty_tpl->tpl_vars['checkId']->value->regMail == 1) {?>checked<?php }?>><span>关闭发送</span></label></li>
						<li><label><input name="regMail" value="2" type="radio" data-arr="reg1,reg2,J_reg2_intro" <?php if ($_smarty_tpl->tpl_vars['checkId']->value->regMail == 2) {?>checked<?php }?>><span>开启发送</span></label></li>
					</ul>
				</td>
				<td>
					<div class="fun_tips">
						<div class="J_radio_change_items" id="J_reg2_intro">选择“开启发送”，则站点新注册用户将发送邮件</div>
					</div>
				</td>
			</tr>
		</table>
		<table width="100%" class="J_radio_change_items" id="reg1" style="margin-bottom:0;">
			<col class="th" />
			<col width="400" />
			<col />
			<tbody>
				<tr>
					<th>邮件标题</th>
					<td>
						<input type="text" class="input length_5 mr5" name="regTitle" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->regTitle;?>
">
					</td>
					<td><div class="fun_tips">支持参数，如下：<br>{sitename}：站点名称<br>{username}：用户名</div></td>
				</tr>

				<tr>
					<th>邮件内容</th>
					<td>
						<textarea class="length_5" name="regContent"><?php echo $_smarty_tpl->tpl_vars['checkId']->value->regContent;?>
</textarea>
					</td>
					<td><div class="fun_tips">支持html代码，支持参数：<br>{username}：用户名<br>{sitename}：站点名称<br>{url}：官方网址<br>{time}：发送时间。</div></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="h_a">基本设置</div>
	<div class="table_full">
		<table width="100%" class="J_radio_change_items" id="reg2" style="margin-bottom:0;">
			<col class="th" />
			<col width="400" />
			<col />
			<tbody>
				<tr>
					<th>注册赠送时间[小时]</th>
					<td>
						<input type="number" class="input length_5 mr5" name="regTime" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->regTime;?>
">小时
					</td>
					<td><div class="fun_tips">新账号注册赠送时间, 0或留空表示不赠送。</div></td>
				</tr>
				<tr>
					<th>注册赠送流量[MB]</th>
					<td>
						<input type="text" class="input length_5 mr5" name="regFlow" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->regFlow;?>
">MB
					</td>
					<td><div class="fun_tips">新账号注册赠送流量, 0或留空表示不赠送。</div></td>
				</tr>
				<tr>
					<th>同一IP重复注册[小时]</th>
					<td>
						<input type="number" class="input length_5 mr5" name="regDitto" value="<?php echo $_smarty_tpl->tpl_vars['checkId']->value->regDitto;?>
">小时
					</td>
					<td><div class="fun_tips">规定时间内，同一IP将无法进行多次注册。0或留空表示不限制。</div></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="btn_wrap_pd">
		<input type="hidden" name="op" value="cmdsave"/>
		<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
	</div>
	</form>
</div>
<?php echo '<script'; ?>
 src="res/js/dev/pages/admin/common/common.js?v20141223"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
</body>
</html><?php }
}
