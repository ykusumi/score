<?php
/**-----------------------------------------------
  データベース接続情報
------------------------------------------------*/
/** host */

// ローカル
if($_SERVER['SERVER_ADDR'] == '127.0.0.1'){
	define("HOST", "score");
	define("USER", "root");
	define("PASSWORD", "");
	define("ROOT_PATH", "/");

}else{
	define("HOST", "LAA0378920-score");
	define("USER", "LAA0378920");
	define("PASSWORD", "root");
}



/** library */
//define("LIBRARY", "jkdb");
?>