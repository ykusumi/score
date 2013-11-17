<?php
if ($_SERVER['SERVER_NAME']=='127.0.0.1') {//ローカルホスト 
    //$path = '.;C:\\xampp\\php\\pear\\PEAR;C:\\xampp\\php\\pear;C:\\Zend;C:\\'; 
} else {//リモートホスト 
    $path = "/home/users/2/blush.jp-check/web/"; /* ←インクルードしたい完全パス */ 
}
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

mb_language("uni"); 
mb_internal_encoding("utf-8");
mb_convert_encoding($string, 'utf8', 'sjis-win');
mb_http_input("auto"); 
mb_http_output("utf-8");   

ini_set( 'display_errors', 1 );

require_once('./libs/Smarty.class.php');
require_once('./admin/module/requires.php');

$smarty = new Smarty();
$userAll = array();
$inName = array();

userList($userAll, $inName);

$smarty->assign("nameList", $userAll);
$smarty -> display("showlogin.tpl");
exit;

function userList(&$outUserAll, &$inName) {

	$inName = array();
	$target = array();
	//$where = array();

	
    try {
		// 商品アイテムマスターを検索
		$dbmaster = new DBMASTER('user');
		$target['USERNAME = ?']  = 'USERNAME AS USERNAME';
		$target['LOGINTIME = ?'] = 'LOGINTIME AS LOGINTIME';
		
		$dbmaster->setSelect('', '', $target,'','','');
		$outUserAll = $dbmaster->fetchAll();
		
		if (!$outUserAll){
			$inName[] = 'sippaisita ';
			//var_dump($target);
		}else{
			$flag = 1;
		}
	} catch (exception $e) {
		var_dump($target['USERNAME']);
    }
}
?>