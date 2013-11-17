<?php
if ($_SERVER['SERVER_NAME']=='127.0.0.1') {//ローカルホスト 
    //$path = '.;C:\\xampp\\php\\pear\\PEAR;C:\\xampp\\php\\pear;C:\\Zend;C:\\'; 
} else {//リモートホスト 
    $path = "/home/users/2/blush.jp-check/web/"; /* ←インクルードしたい完全パス */ 
}
set_include_path(get_include_path() . PATH_SEPARATOR . $path);


require_once('./libs/Smarty.class.php');
require_once('./admin/module/requires.php');

mb_language("uni"); 
mb_internal_encoding("utf-8");
mb_convert_encoding($string, 'utf8', 'sjis-win');
mb_http_input("auto"); 
mb_http_output("utf-8");

ini_set( 'display_errors', 1 );

$smarty = new Smarty();
$ballCount = array();
$userData = array();

session_start();
$util = new Util();

//ログイン時間を設定する
$logintime = $_POST['logintime'];

//ユーザデータを抽出する
selectUserName($logintime, $userData);
$countAll = count($userData);
for($count = 0; $count < $countAll; $count++){

	//1球目
	if($userData[$count]['1KYUME'] == 1){
		$userData[$count]['1KYUME'] = 'ストライク';
		
	}else if($userData[$count]['1KYUME'] == 2){
		$userData[$count]['1KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['1KYUME']);
	}
	
	//2球目
	if($userData[$count]['2KYUME'] == 1){
		$userData[$count]['2KYUME'] = 'ストライク';
		
	}else if($userData[$count]['2KYUME'] == 2){
		$userData[$count]['2KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['2KYUME']);
	}
	
	//3球目
	if($userData[$count]['3KYUME'] == 1){
		$userData[$count]['3KYUME'] = 'ストライク';
		
	}else if($userData[$count]['3KYUME'] == 2){
		$userData[$count]['3KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['3KYUME']);
	}
	
	//4球目
	if($userData[$count]['4KYUME'] == 1){
		$userData[$count]['4KYUME'] = 'ストライク';
		
	}else if($userData[$count]['4KYUME'] == 2){
		$userData[$count]['4KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['4KYUME']);
	}
	
	//5球目
	if($userData[$count]['5KYUME'] == 1){
		$userData[$count]['5KYUME'] = 'ストライク';
		
	}else if($userData[$count]['5KYUME'] == 2){
		$userData[$count]['5KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['5KYUME']);
	}
	
	//6球目
	if($userData[$count]['6KYUME'] == 1){
		$userData[$count]['6KYUME'] = 'ストライク';
		
	}else if($userData[$count]['6KYUME'] == 2){
		$userData[$count]['6KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['6KYUME']);
	}
	
	//7球目
	if($userData[$count]['7KYUME'] == 1){
		$userData[$count]['7KYUME'] = 'ストライク';
		
	}else if($userData[$count]['7KYUME'] == 2){
		$userData[$count]['7KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['7KYUME']);
	}
	
	//8球目
	if($userData[$count]['8KYUME'] == 1){
		$userData[$count]['8KYUME'] = 'ストライク';
		
	}else if($userData[$count]['8KYUME'] == 2){
		$userData[$count]['8KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['8KYUME']);
	}
	
	//9球目
	if($userData[$count]['9KYUME'] == 1){
		$userData[$count]['9KYUME'] = 'ストライク';
		
	}else if($userData[$count]['9KYUME'] == 2){
		$userData[$count]['9KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['9KYUME']);
	}
	
	//10球目
	if($userData[$count]['10KYUME'] == 1){
		$userData[$count]['10KYUME'] = 'ストライク';
		
	}else if($userData[$count]['10KYUME'] == 2){
		$userData[$count]['10KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['10KYUME']);
	}
	
	//11球目
	if($userData[$count]['11KYUME'] == 1){
		$userData[$count]['11KYUME'] = 'ストライク';
		
	}else if($userData[$count]['11KYUME'] == 2){
		$userData[$count]['11KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['11KYUME']);
	}
	//12球目
	if($userData[$count]['12KYUME'] == 1){
		$userData[$count]['12KYUME'] = 'ストライク';
		
	}else if($userData[$count]['12KYUME'] == 2){
		$userData[$count]['12KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['12KYUME']);
	}
	
	//13球目
	if($userData[$count]['13KYUME'] == 1){
		$userData[$count]['13KYUME'] = 'ストライク';
		
	}else if($userData[$count]['13KYUME'] == 2){
		$userData[$count]['13KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['13KYUME']);
	}
	
	//14球目
	if($userData[$count]['14KYUME'] == 1){
		$userData[$count]['14KYUME'] = 'ストライク';
		
	}else if($userData[$count]['14KYUME'] == 2){
		$userData[$count]['14KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['14KYUME']);
	}
	
	//15球目
	if($userData[$count]['15KYUME'] == 1){
		$userData[$count]['15KYUME'] = 'ストライク';
		
	}else if($userData[$count]['15KYUME'] == 2){
		$userData[$count]['15KYUME'] = 'ボール';
	}else{
		unset($userData[$count]['15KYUME']);
	}	
}
	//1イニングに初期化
	$_SESSION['inning'] = 1;
	//最初の打者に初期化
	$_SESSION['total'] = 1;
	//1番バッターに初期化
	$_SESSION['butter'] = 1;
	//0アウトに初期化
	$_SESSION['out'] = 0;
	//ユーザーの初期化
	$_SESSION['user'] = $createUser;


$user = $_SESSION['user'];			//ユーザ名
$time = $_SESSION['logintime'];		//ログインした時間

$inning = $_SESSION['inning'];		//イニング数
$total = $_SESSION['total'];		//合計打者数
$butter = $_SESSION['butter'];		//何番バッターか
$out = $_SESSION['out'];			//合計アウト数(2アウトまで)

//POSTされたデータを変数に設定
/*
$ballCount[0]   = intval($_POST['1']);
$ballCount[1]   = intval($_POST['2']);
$ballCount[2]   = intval($_POST['3']);
$ballCount[3]   = intval($_POST['4']);
$ballCount[4]   = intval($_POST['5']);
$ballCount[5]   = intval($_POST['6']);
$ballCount[6]   = intval($_POST['7']);
$ballCount[7]   = intval($_POST['8']);
$ballCount[8]   = intval($_POST['9']);
$ballCount[9]   = intval($_POST['10']);
$ballCount[10]  = intval($_POST['11']);
$ballCount[11]  = intval($_POST['12']);
$ballCount[12]  = intval($_POST['13']);
$ballCount[13]  = intval($_POST['14']);
$ballCount[14]  = intval($_POST['15']);
$mode = $_POST['mode'];
*/

//テンプレートに変数を設定

$smarty -> assign("score", $userData);
$smarty -> assign("user", $user);
$smarty -> assign("inning", $inning);
$smarty -> assign("total", $total);
$smarty -> assign("butter", $butter);
$smarty -> assign("out", $out);
$smarty -> assign("error", $inName[0]);

$smarty -> display("show.tpl");
exit;


function ballCountUpdate($inUser, $inTime, $inInning, $inButter, $inTotal, $inMode, $inBallCount, &$inName) {

	$inName = array();
	$target = array();
	$where = array();
	
	//ヒットの場合
	if($inMode == 1){
		$result = 'hit or on-base';
	}
	//アウトの場合
	if($inMode == 2){
		$result = 'out';
	}
	//3アウトチェンジの場合
	if($inMode == 3){
		$result = 'change';
	}
	
	
    if (!$error) {
        try {
			// 商品アイテムマスターを検索
			$dbmaster = new DBMASTER('data');
			$target['USER'] = $inUser;
			$target['LOGINTIME'] = $inTime;
			$target['INNING'] = $inInning;
			$target['TOTAL'] = $inTotal;
			$target['BUTTER'] = $inButter;
			$target['RESULT']  = $result;
			$target['1KYUME']  = $inBallCount[0];
			$target['2KYUME']  = $inBallCount[1];
			$target['3KYUME']  = $inBallCount[2];
			$target['4KYUME']  = $inBallCount[3];
			$target['5KYUME']  = $inBallCount[4];
			$target['6KYUME']  = $inBallCount[5];
			$target['7KYUME']  = $inBallCount[6];
			$target['8KYUME']  = $inBallCount[7];
			$target['9KYUME']  = $inBallCount[8];
			$target['10KYUME'] = $inBallCount[9];
			$target['11KYUME'] = $inBallCount[10];
			$target['12KYUME'] = $inBallCount[11];
			$target['13KYUME'] = $inBallCount[12];
			$target['14KYUME'] = $inBallCount[13];
			$target['15KYUME'] = $inBallCount[14];
			
			
			$a = $dbmaster->insert($target);
			
			if (!$a){
				$inName[] = 'sippaisita ';
			}else{
				$flag = 1;
			}
		} catch (exception $e) {
			var_dump($target);
        }
    }
}

function addScore(&$inTotal, &$inButter) {

	//合計打者数を1増やす
	$_SESSION['total']++;
	$inTotal = $_SESSION['total'];
	
	//もし9番バッターなら1番バッターに戻す
	//そうでなければ、次のバッターをボックスに設置する
	if($_SESSION['butter'] == 9){
		$_SESSION['butter'] = 1;
	}else{
		//次のバッターをボックスに設置(+1する)
		$_SESSION['butter']++;
	}
	$inButter = $_SESSION['butter'];

}
function selectUserName($inLoginTime, &$outUserDataAll) {

	$inName = array();
	$target = array();
	$target2 = array();
	$where = array();
	
	$where['LOGINTIME = ?'] = $inLoginTime;
	
    try {
		// 商品アイテムマスターを検索
		$dbmaster = new DBMASTER('data');
		
		$target['USER = ?']      = 'USER AS USER';
		$target['LOGINTIME = ?'] = 'LOGINTIME AS LOGINTIME';

		$target['INNING = ?']     = 'INNING AS INNING';
		$target['TOTAL = ?']      = 'TOTAL AS TOTAL';
		$target['BUTTER = ?']     = 'BUTTER AS BUTTER';
		$target['RESULT = ?']     = 'RESULT AS RESULT';
		$target['1KYUME = ?']     = '1KYUME AS 1KYUME';
		$target['2KYUME = ?']     = '2KYUME AS 2KYUME';
		$target['3KYUME = ?']     = '3KYUME AS 3KYUME';
		$target['4KYUME = ?']     = '4KYUME AS 4KYUME';
		$target['5KYUME = ?']     = '5KYUME AS 5KYUME';
		$target['6KYUME = ?']     = '6KYUME AS 6KYUME';
		$target['7KYUME = ?']     = '7KYUME AS 7KYUME';
		$target['8KYUME = ?']     = '8KYUME AS 8KYUME';
		$target['9KYUME = ?']     = '9KYUME AS 9KYUME';
		$target['10KYUME = ?']    = '10KYUME AS 10KYUME';
		$target['11KYUME = ?']    = '11KYUME AS 11KYUME';
		$target['12KYUME = ?']    = '12KYUME AS 12KYUME';
		$target['13KYUME = ?']    = '13KYUME AS 13KYUME';
		$target['14KYUME = ?']    = '14KYUME AS 14KYUME';
		$target['15KYUME = ?']    = '15KYUME AS 15KYUME';

		$dbmaster->setSelect($where, '', $target,'','', '');
		$outUserDataAll = $dbmaster->fetchAll();
		
		if (!$outUserDataAll){
			$inName[] = 'sippaisita ';
		}else{
			$flag = 1;
		}
		
	} catch (exception $e) {
		var_dump($target);
		//var_dump($target2);
    }

}

?>