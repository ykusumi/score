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
session_start();
$util = new Util();

if(!isset($_SESSION['inning'])){
	
	//ユーザを設定する
	$createUser = $_POST['username'];

	//ログイン時間を取得する
	$_SESSION['logintime'] = $util->getYmdHis();
	$time = $_SESSION['logintime'];

	//ユーザを登録する
	createUserName($createUser, $time);
	
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
}

$user = $_SESSION['user'];			//ユーザ名
$time = $_SESSION['logintime'];		//ログインした時間

$inning = $_SESSION['inning'];		//イニング数
$total = $_SESSION['total'];		//合計打者数
$butter = $_SESSION['butter'];		//何番バッターか
$out = $_SESSION['out'];			//合計アウト数(2アウトまで)

//POSTされたデータを変数に設定
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

// 出塁またはアウトでバッター交代
if($mode == 1 || $mode == 2){
	
	if($mode == 1){
		ballCountUpdate($user, $time, $inning, $butter, $total, $mode, $ballCount, $inName);
	}
	if($mode == 2){
		ballCountUpdate($user, $time, $inning, $butter, $total, $mode, $ballCount, $inName);
		$_SESSION['out']++;
		$out = $_SESSION['out'];
	}
	
	//合計打者数と何番バッターを変更する
	addScore($total, $butter);

}

// 3アウトチェンジ交代
if($mode == 3){
	
	ballCountUpdate($user, $time, $inning, $butter, $total, $mode, $ballCount, $inName);

	//合計打者数と何番バッターを変更する
	addScore($total, $butter);

	//3アウトチェンジなので、次のイニングにする
	$_SESSION['inning']++;
	$inning = $_SESSION['inning'];
	
	//アウトカウントを0に戻す(攻守交替のため)
	$_SESSION['out'] = 0 ;
	$out = $_SESSION['out'];
	
}
// ログアウトする
if($mode == 4){
	$_SESSION = array();
	
	$smarty -> display("index.tpl");
	exit;
	
}
//テンプレートに変数を設定
$smarty -> assign("user", $user);
$smarty -> assign("inning", $inning);
$smarty -> assign("total", $total);
$smarty -> assign("butter", $butter);
$smarty -> assign("out", $out);
$smarty -> assign("error", $inName[0]);

$smarty -> display("score.tpl");
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
function createUserName($inCreateUser, $inTime) {

	$inName = array();
	$target = array();
	$target2 = array();
	
    try {
		// 商品アイテムマスターを検索
		$dbmaster = new DBMASTER('user');
		
		$target['USERNAME'] = $inCreateUser;
		$target['LOGINTIME'] = $inTime;

		$a = $dbmaster->insert($target);
		
		if (!$a){
			$inName[] = 'sippaisita ';
		}else{
			$flag = 1;
		}
		
		/*
		// 商品アイテムマスターを検索
		$dbmaster2 = new DBMASTER('data');
		$target2['USER'] = $inCreateUser;
		$target2['INNING'] = '';
		$target2['TOTAL'] = '';
		$target2['BUTTER'] = '';
		$target2['RESULT']  = '';
		$target2['1KYUME']  = '';
		$target2['2KYUME']  = '';
		$target2['3KYUME']  = '';
		$target2['4KYUME']  = '';
		$target2['5KYUME']  = '';
		$target2['6KYUME']  = '';
		$target2['7KYUME']  = '';
		$target2['8KYUME']  = '';
		$target2['9KYUME']  = '';
		$target2['10KYUME'] = '';
		$target2['11KYUME'] = '';
		$target2['12KYUME'] = '';
		$target2['13KYUME'] = '';
		$target2['14KYUME'] = '';
		$target2['15KYUME'] = '';
		
		$a2 = $dbmaster2->insert($target2);
		if (!$a2){
			$inName[] = 'sippaisita ';
		}else{
			$flag = 1;
		}
		*/
	} catch (exception $e) {
		var_dump($target);
		//var_dump($target2);
    }

}

?>