<?php /* Smarty version Smarty-3.1.12, created on 2013-07-17 12:54:05
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1660451dd82f09df857-53149332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1374058436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1660451dd82f09df857-53149332',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51dd82f0a501e9_29574790',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd82f0a501e9_29574790')) {function content_51dd82f0a501e9_29574790($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン画面</title>
     <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
     <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
     <link rel="stylesheet" href="./common/css/common.css" />
     <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
     <script src="./common/js/common.js"></script>
</head>
<body style="padding-top:40px">
<div class="container">
	<form class="form-horizontal" action="./score.php" method="post">
		<div class="control-group">
			<label class="control-label" for="email">User</label>
				<div class="controls">
					<input type="text" id="name" name="username">
				</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="submit" value="Sign in" class="btn">
			</div>
		</div>
	</form>
</div>
 
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
</body>
</html><?php }} ?>