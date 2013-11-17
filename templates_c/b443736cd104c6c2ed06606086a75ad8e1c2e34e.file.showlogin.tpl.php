<?php /* Smarty version Smarty-3.1.12, created on 2013-07-21 22:50:47
         compiled from ".\templates\showlogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:373551e6746d2ad6d3-41261683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b443736cd104c6c2ed06606086a75ad8e1c2e34e' => 
    array (
      0 => '.\\templates\\showlogin.tpl',
      1 => 1374414641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '373551e6746d2ad6d3-41261683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e6746d38a1e4_82985869',
  'variables' => 
  array (
    'nameList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e6746d38a1e4_82985869')) {function content_51e6746d38a1e4_82985869($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>結果表示</title>
     <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
     <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
     <link rel="stylesheet" href="./common/css/common.css" />
     <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
     <script src="./common/js/common.js"></script>
</head>
<body style="padding-top:40px">
<div class="container">
	<form class="form-horizontal" action="./show.php" method="post">
		<div data-role="fieldcontain">
			<label for="select-choice-15" class="select">User</label>
			<select name="logintime" id="select-choice-15" data-theme="b" data-overlay-theme="d" data-native-menu="false">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['name'] = 'dbList';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nameList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['total']);
?>
				<option  value="<?php echo $_smarty_tpl->tpl_vars['nameList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['LOGINTIME'];?>
"><?php echo $_smarty_tpl->tpl_vars['nameList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['USERNAME'];?>
</option>
			<?php endfor; endif; ?>

			</select>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="submit" value="Sign in" class="btn">
			</div>
		</div>
	</form>
</div>
 
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="../jk/common/js/bootstrap.min.js"></script>
</body>
</html><?php }} ?>