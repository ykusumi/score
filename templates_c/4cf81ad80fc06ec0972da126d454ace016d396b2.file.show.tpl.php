<?php /* Smarty version Smarty-3.1.12, created on 2013-07-21 23:20:36
         compiled from ".\templates\show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:431151ebe4022e8873-68598095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cf81ad80fc06ec0972da126d454ace016d396b2' => 
    array (
      0 => '.\\templates\\show.tpl',
      1 => 1374416431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '431151ebe4022e8873-68598095',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51ebe40235be09_59246610',
  'variables' => 
  array (
    'score' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebe40235be09_59246610')) {function content_51ebe40235be09_59246610($_smarty_tpl) {?><!DOCTYPE html>
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

<hr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['name'] = 'dbList';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dbList']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['score']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				ユーザー名：<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['USER'];?>
<br><?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['INNING'];?>
イニング<br><?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['TOTAL'];?>
人目-<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['BUTTER'];?>
番バッター<br>
				1球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['1KYUME'];?>
<br>
				2球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['2KYUME'];?>
<br>
				3球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['3KYUME'];?>
<br>
				4球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['4KYUME'];?>
<br>
				5球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['5KYUME'];?>
<br>
				6球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['6KYUME'];?>
<br>
				7球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['7KYUME'];?>
<br>
				8球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['8KYUME'];?>
<br>
				9球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['9KYUME'];?>
<br>
				10球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['10KYUME'];?>
<br>
				11球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['11KYUME'];?>
<br>
				12球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['12KYUME'];?>
<br>
				13球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['13KYUME'];?>
<br>
				14球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['14KYUME'];?>
<br>
				15球目:<?php echo $_smarty_tpl->tpl_vars['score']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dbList']['index']]['15KYUME'];?>
<br>
				<br>
				
			<?php endfor; endif; ?>

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
<script src="./common/js/bootstrap.min.js"></script>
</body>
</html><?php }} ?>