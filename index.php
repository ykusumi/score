<?php

//require_once('../../../zend/Version.php');

mb_language("uni"); 
mb_internal_encoding("utf-8");
mb_convert_encoding($string, 'utf8', 'sjis-win');
mb_http_input("auto"); 
mb_http_output("utf-8");   

ini_set( 'display_errors', 1 );

require_once("./libs/Smarty.class.php");
$smarty = new Smarty();

$smarty -> display("index.tpl");
exit;
?>