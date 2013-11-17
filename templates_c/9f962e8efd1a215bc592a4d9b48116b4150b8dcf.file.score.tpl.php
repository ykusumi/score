<?php /* Smarty version Smarty-3.1.12, created on 2013-07-17 12:54:20
         compiled from ".\templates\score.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2657151dfbe2d5e0a06-71177020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f962e8efd1a215bc592a4d9b48116b4150b8dcf' => 
    array (
      0 => '.\\templates\\score.tpl',
      1 => 1374058442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2657151dfbe2d5e0a06-71177020',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51dfbe2d65a0d8_65513610',
  'variables' => 
  array (
    'user' => 0,
    'inning' => 0,
    'total' => 0,
    'butter' => 0,
    'out' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dfbe2d65a0d8_65513610')) {function content_51dfbe2d65a0d8_65513610($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>記録用紙</title>
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
     <link rel="stylesheet" href="./common/css/common.css" />
     <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
     <script src="./common/js/common.js"></script>

</head>

<script type="text/javascript">
    var name = "#floatMenu";
    var menuYloc = null;
     
        $(document).ready(function(){
            menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
            $(window).scroll(function () { 
                offset = menuYloc+$(document).scrollTop()+"px";
                $(name).animate({top:offset},{duration:900,queue:false});
            });
        }); 
     </script>

<body style="padding-top:40px">
ユーザー名：<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
<br>
<?php echo $_smarty_tpl->tpl_vars['inning']->value;?>
イニング<br>
<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
人目-<?php echo $_smarty_tpl->tpl_vars['butter']->value;?>
番バッター<br>
<?php echo $_smarty_tpl->tpl_vars['out']->value;?>
アウト<br>
<hr>
<form class="form-horizontal" action="./score.php" method="post" name="scoreBoard">
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>1球目</legend>
		<input type="radio" name="1" id="1-1" value="1" />
		<label for="1-1">ストライク</label>
		<input type="radio" name="1" id="1-2" value="2" />
		<label for="1-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>2球目</legend>
		<input type="radio" name="2" id="2-1" value="1" />
		<label for="2-1">ストライク</label>
		<input type="radio" name="2" id="2-2" value="2" />
		<label for="2-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>3球目</legend>
		<input type="radio" name="3" id="3-1" value="1" />
		<label for="3-1">ストライク</label>
		<input type="radio" name="3" id="3-2" value="2" />
		<label for="3-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>4球目</legend>
		<input type="radio" name="4" id="4-1" value="1" />
		<label for="4-1">ストライク</label>
		<input type="radio" name="4" id="4-2" value="2" />
		<label for="4-2">ボール</label>
	</fieldset>
		<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>5球目</legend>
		<input type="radio" name="5" id="5-1" value="1" />
		<label for="5-1">ストライク</label>
		<input type="radio" name="5" id="5-2" value="2" />
		<label for="5-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>6球目</legend>
		<input type="radio" name="6" id="6-1" value="1" />
		<label for="6-1">ストライク</label>
		<input type="radio" name="6" id="6-2" value="2" />
		<label for="6-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>7球目</legend>
		<input type="radio" name="7" id="7-1" value="1" />
		<label for="7-1">ストライク</label>
		<input type="radio" name="7" id="7-2" value="2" />
		<label for="7-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>8球目</legend>
		<input type="radio" name="8" id="8-1" value="1" />
		<label for="8-1">ストライク</label>
		<input type="radio" name="8" id="8-2" value="2" />
		<label for="8-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>9球目</legend>
		<input type="radio" name="9" id="9-1" value="1" />
		<label for="9-1">ストライク</label>
		<input type="radio" name="9" id="9-2" value="2" />
		<label for="9-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>10球目</legend>
		<input type="radio" name="10" id="10-1" value="1" />
		<label for="10-1">ストライク</label>
		<input type="radio" name="10" id="10-2" value="2" />
		<label for="10-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>11球目</legend>
		<input type="radio" name="11" id="11-1" value="1" />
		<label for="11-1">ストライク</label>
		<input type="radio" name="11" id="11-2" value="2" />
		<label for="11-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>12球目</legend>
		<input type="radio" name="12" id="12-1" value="1" />
		<label for="12-1">ストライク</label>
		<input type="radio" name="12" id="12-2" value="2" />
		<label for="12-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>13球目</legend>
		<input type="radio" name="13" id="13-1" value="1" />
		<label for="13-1">ストライク</label>
		<input type="radio" name="13" id="13-2" value="2" />
		<label for="13-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>14球目</legend>
		<input type="radio" name="14" id="14-1" value="1" />
		<label for="14-1">ストライク</label>
		<input type="radio" name="14" id="14-2" value="2" />
		<label for="14-2">ボール</label>
	</fieldset>
	<fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
	<legend>15球目</legend>
		<input type="radio" name="15" id="15-1" value="1" />
		<label for="15-1">ストライク</label>
		<input type="radio" name="15" id="15-2" value="2" />
		<label for="15-2">ボール</label>
	</fieldset>
	<div id="floatMenu">
	<input type="hidden" name="mode" value="1">
	<button type="button" onclick="hit(this.form)" name="puButton" value="1">
		ヒットまたは出塁
	</button>
	<button type="button" onclick="out(this.form)" name="puButton" value="2">
		アウト
	</button>
	<button type="button" onclick="change(this.form)" name="puButton" value="3" >
		３アウト
	</button>
	<button type="button" onclick="logout(this.form)" name="puButton" value="4" >
		ログアウト
	</button>	

	</div>
	
</form>
 
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
</body>
</html><?php }} ?>