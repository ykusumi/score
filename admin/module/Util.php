<?php
class Util {
  function Util() {
  }



 /**
  * 現在の日時を"Ymd"形式で返します。
  * 
  * @return String
  */
  function getYmd() {
    return date("Ymd", time());
  }

 /**
  * 現在の時刻を"His"形式で返します。
  * 
  * @return String
  */
  function getHis() {
    return date("His", time());
  }

 /**
  * 現在の日時を"Y/m/d H:i:s"形式で返します。
  * 
  * @return String
  */
  function getYmdHis() {
    return date("Y-m-d H:i:s", time());
  }

 /**
  * 現在の日時の1日前を"Y/m/d"形式で返します。
  * 
  * @return String
  */
  function getYmdYesterday() {
    return date("Y/m/d", time()-3600*24);
  }

 /**
  * 現在の日時の1日前を"Y/m"形式で返します。
  * 
  * @return String
  */
  function getYm() {
    return date("Y/m", time()-3600*24);
  }

 /**
  * 現在の日時の1時間前を"Y/m/d H:i:s"形式で返します。
  * 
  * @return String
  */
  function getYmdHisOneHour() {
    return date("Y/m/d H:i:s", time() - 3600);
  }

 /**
  * 現在の日時の1月前を"Y/m/d H:i:s"形式で返します。
  * 
  * @return String
  */
  function getYmdHisOneMonth() {
    return date("Y/m/d H:i:s", time() - 3600*24*31);
  }

 /**
  * "Y/m/d H:i:s"形式で返します。
  * 
  * @return String
  */
  function retYmdHis($timestamp){
  	if($timestamp){
	  	$date = substr($timestamp,0,10);
	  	$time = substr($timestamp,11,8);
	  	$time = strtotime($date." ".$time);
	  	return date("Y-m-d H:i:s",$time);
  	}
  }

   /**
   * a-z、0-9でランダムに構成された文字列を返します。
   * 
   * @param int $arg 作成する文字列の桁数
   * @return String
   */
  function makeString($arg) {
    $str = "ABCDEFGHJKMNRSTXYZabcdefghjkmnrstxyz012345679";
    mt_srand((double)microtime()*1000000);
    $return_str = "";
    for($i = 0; $i < $arg; $i++) {
      $return_str .= substr($str, mt_rand(0, strlen($str) - 1), 1);
    }
    return $return_str;
  }
  
    /**
   * 0-9でランダムに構成された文字列を返します。
   * 
   * @param int $arg 作成する文字列の桁数
   * @return String
   */
  function makeNum($arg) {
    $str = "0123456789";
    mt_srand((double)microtime()*1000000);
    $return_str = "";
    for($i = 0; $i < $arg; $i++) {
      $return_str .= substr($str, mt_rand(0, strlen($str) - 1), 1);
    }
    return $return_str;
  }
  
  function makeNum2($arg,$id){
  	$str = "0123456789";
  	mt_srand($id);
  	$return_str = "";
  	for($i=0;$i<$arg;$i++){
  		$return_str .= substr($str,mt_rand(0,strlen($str) -1),1);
  	}
  	return $return_str;
  }
  
    /**
   * a-z、0-9でランダムに構成された文字列を返します。
   * 
   * @param int $arg 作成する文字列の桁数
   * @return String
   */
  function makeString2($arg,$num) {
    $str = "ABCDEFGHJKMNRSTXYZabcdefghjkmnrstxyz012345679";
    srand($num);
    $return_str = "";
    for($i = 0; $i < $arg; $i++) {
      $return_str .= substr($str, rand(0, strlen($str) - 1), 1);
    }
    return $return_str;
  }

  /**
   * 引数で与えられた文字列の文字数分"*"を返します。
   * 
   * @param String $arg
   * @return String
   */
  function makeAsterisk($arg) {
    if (!$arg) {
      return "";
    } else {
      for($i=0; $i<strlen($arg); $i++) {
        $return_str = $return_str."*";
      }
      return $return_str;
    }
  }

  /**
   * 第1引数で与えられた対象文字列が第2引数で与えられた文字数より大きい場合、
   * 以降の文字列を削除し、第3引数で与えられた付与文字列を付与します。
   * 
   * @param String $target_str 対象文字列
   * @param int $number 文字数
   * @param String $invest_str 付与文字列
   * @return String
   */
  function cutAndInvest($target_str, $number, $invest_str) {
    if (mb_strlen($target_str) <= $number) {
       return $target_str;
    } else {
       return mb_substr($target_str, 0, $number).$invest_str;
    }
  }

  /**
   * ファイルの拡張子を返します。
   * 
   * @param String $arg 拡張子を含んだファイル名 or パス＋拡張子を含んだファイル名
   * @return String
   */
  function getFileExtension($arg) {
    $ary = pathinfo($arg);
    return $ary["extension"];
  }
  
/**
 * 数値の配列を返します。
 *
 * @param 開始番号 $from
 * @param 終了番号 $to
 * @param 間隔 $interval
 * @return array
 */
  function getArrayNumber($from,$to,$interval){
  	for($i=$from;$i<$to;$i=$i+$interval){
  		$array[$i] = $i;
  	}
  	return $array;
  }

  /**
   * 2次元配列からselectタグを作成して返します。
   * $blank_textに文字列をセットすると、
   * 先頭に、[値=""][表示文字="文字列"]のoptionタグが追加されます。
   * $blank_textに""をセットすると、先頭にoptionタグは追加されません。
   * $blank_textに"BLANK"をセットすると、
   * 先頭に、[値=""][表示文字=""]のoptionタグが追加されます。
   *
   * @param Array $array 2次元配列
   * @param String $name selectタグの名前
   * @param int $width selectタグのwidth
   * @param String $selected selectedを付加する値
   * @param String $blank_text 1番目のoptionタグに指定する値
   * @return String
   */
  function getSelectTag($array, $name, $width, $selected, $blank_text) {
    $return_str = "<select style=\"width:".$width."\" name=\"".$name."\">\n";
    if (strlen($blank_text)) {
      if ($blank_text == "BLANK") {
        if (!strlen($selected)) {
          $return_str = $return_str."<option value=\"\" selected></option>";
        } else {
          $return_str = $return_str."<option value=\"\"></option>";
        }
      } else {
        if (!strlen($selected)) {
          $return_str = $return_str."<option value=\"\" selected>".$blank_text."</option>";
        } else {
          $return_str = $return_str."<option value=\"\">".$blank_text."</option>";
        }
      }
    }

    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i][0] == $selected) {
        $return_str = $return_str."<option value=\"".htmlspecialchars($array[$i][0])."\" selected>";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."</option>";
      } else {
        $return_str = $return_str."<option value=\"".htmlspecialchars($array[$i][0])."\">";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."</option>";
      }
    }
    $return_str = $return_str."</select>\n";
    return $return_str;
  }

  /**
   * 2次元配列からselectタグを作成して返します。
   * $blank_textに文字列をセットすると、
   * 先頭に、[値=""][表示文字="文字列"]のoptionタグが追加されます。
   * $blank_textに""をセットすると、先頭にoptionタグは追加されません。
   * $blank_textに"BLANK"をセットすると、
   * 先頭に、[値=""][表示文字=""]のoptionタグが追加されます。
   * $script_nameにセットしたスクリプト名を、onChangeで指定します。
   * 
   * @param Array $array 2次元配列
   * @param String $name selectタグの名前
   * @param int $width selectタグのwidth
   * @param String $selected selectedを付加する値
   * @param String $blank_text 1番目のoptionタグに指定する値
   * @param String $script_name JavaScriptのスクリプト名
   * @return String
   */
  function getSelectTagIncludeScript($array, $name, $width, $selected, $blank_text, $script_name) {
    $return_str = "<select style=\"width:".$width."\" name=\"".$name."\" onChange=\"JavaScript:".$script_name."\">\n";
    if (strlen($blank_text)) {
      if ($blank_text == "BLANK") {
        if (!strlen($selected)) {
          $return_str = $return_str."<option value=\"\" selected></option>";
        } else {
          $return_str = $return_str."<option value=\"\"></option>";
        }
      } else {
        if (!strlen($selected)) {
          $return_str = $return_str."<option value=\"\" selected>".$blank_text."</option>";
        } else {
          $return_str = $return_str."<option value=\"\">".$blank_text."</option>";
        }
      }
    }

    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i][0] == $selected) {
        $return_str = $return_str."<option value=\"".htmlspecialchars($array[$i][0])."\" selected>";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."</option>";
      } else {
        $return_str = $return_str."<option value=\"".htmlspecialchars($array[$i][0])."\">";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."</option>";
      }
    }
    $return_str = $return_str."</select>\n";
    return $return_str;
  }

  /**
   * 2次元配列からradioタグを作成して返します。
   *
   * @param Array $array 2次元配列
   * @param String $name radioタグの名前
   * @param String $checked checkedを付加する値
   * @return String
   */
  function getRadioTag($array, $name, $checked) {
    for ($i = 0; $i < count($array); $i++) {
      if ($i == 0 && !strlen($checked)) {
        $return_str = $return_str."<input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($array[$i][0])."\" checked> ";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."<br>";
      } else {
        if ($array[$i][0] == $checked) {
          $return_str = $return_str."<input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($array[$i][0])."\" checked> ";
          $return_str = $return_str.htmlspecialchars($array[$i][1]);
          $return_str = $return_str."<br>";
        } else {
          $return_str = $return_str."<input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($array[$i][0])."\"> ";
          $return_str = $return_str.htmlspecialchars($array[$i][1]);
          $return_str = $return_str."<br>";
        }
      }
    }
    return $return_str;
  }
    function getRadioTagApply($array, $name, $checked, $checked2) {
      $i=0;
      $return_str = $return_str."<table class=\"reset\" border=0 style=\"width:600;\"><tr>";
    foreach($array as $key => $value) {
      if($i==0&&!strlen($checked)){
        $checked_t=" checked";
      }elseif($key==$checked){
        $checked_t=" checked";
      }else{
        $checked_t=""; 
      }
        $return_str = $return_str."<td nowrap><input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($key)."\"".$checked_t."> ";
        $return_str = $return_str.htmlspecialchars($value[0]['string']);
        if($key=="5"){
          if($checked2=="2"){
            $checked_5_2 = "checked";
          }elseif($checked2=="1"){
            $checked_5_1 = "checked";
          }
          $return_str = $return_str." <table class=\"jigyo_bucho\"><tr><td nowrap><input type=\"radio\" name=\"".$name."J\" value=\"1\" ".$checked_5_1.">".$value[0]['ystr']."<br>";
          $return_str = $return_str." <input type=\"radio\" name=\"".$name."J\" value=\"2\" ".$checked_5_2.">".$value[1]['ystr']."</td></tr></table>";
        }
        $return_str = $return_str."</td>";
        
      $i++;
    }
    $return_str = $return_str."</tr></table>";
    return $return_str;
  }

  /**
   * 2次元配列からradioタグを作成して返します。
   *
   * @param Array $array 2次元配列
   * @param String $name radioタグの名前
   * @param String $checked checkedを付加する値
   * @return String
   */
  function getRadioTag2($array, $name, $checked) {
    for ($i = 0; $i < count($array); $i++) {
      if ($i == 0 && !strlen($checked)) {
        $return_str = $return_str."<input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($array[$i][0])."\" checked> ";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
		if($i%2 == 1){
        $return_str = $return_str."<img src=\"{$admin_img_url}/spacer.gif\" width=\"20\" height=\"1\">";
		}else{
		$return_str = $return_str."<br>";
		}
      } else {
        if ($array[$i][0] == $checked) {
          $return_str = $return_str."<input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($array[$i][0])."\" checked> ";
          $return_str = $return_str.htmlspecialchars($array[$i][1]);
		if($i%2 == 1){
        $return_str = $return_str."<img src=\"{$admin_img_url}/spacer.gif\" width=\"20\" height=\"1\">";
		}else{
		$return_str = $return_str."<br>";
		}
        } else {
          $return_str = $return_str."<input type=\"radio\" name=\"".$name."\" value=\"".htmlspecialchars($array[$i][0])."\"> ";
          $return_str = $return_str.htmlspecialchars($array[$i][1]);
		if($i%2 == 1){
        $return_str = $return_str."<img src=\"{$admin_img_url}/spacer.gif\" width=\"20\" height=\"1\">";
		}else{
		$return_str = $return_str."<br>";
		}
        }
      }
    }
    return $return_str;
  }

  /**
   * 1つのチェックボックスタグを作成して返します。
   * 
   * @param String $name チェックボックスタグのname
   * @param String $value チェックボックスタグのvalue
   * @param String $text チェックボックスタグのテキスト
   * @param String $check_flag チェックボックスのチェックの有無を決定するフラグ
   * @return String
   */
  function getCheckboxOneTag($name, $value, $text, $check_flag) {
    if (strlen($check_flag)) {
      $return_str = $return_str."<input type=\"checkbox\" name=\"".$name."\" value=\"".htmlspecialchars($value)."\" checked>".htmlspecialchars($text);
    } else {
      $return_str = $return_str."<input type=\"checkbox\" name=\"".$name."\" value=\"".htmlspecialchars($value)."\">".htmlspecialchars($text);
    }
    return $return_str;
  }
  /**
   * 1つのチェックボックスタグを作成して返します。複数チェック用
   * 
   * @param String $name チェックボックスタグのname
   * @param String $value チェックボックスタグのvalue
   * @param String $text チェックボックスタグのテキスト
   * @param String $check_flag チェックボックスのチェックの有無を決定するフラグ
   * @return String
   */
  function getCheckboxOneTagArray($name, $value, $text, $check_flag) {
    if (strlen($check_flag)) {
      $return_str = $return_str."<input type=\"checkbox\" name=\"".$name."[]\" value=\"".htmlspecialchars($value)."\" checked>".htmlspecialchars($text);
    } else {
      $return_str = $return_str."<input type=\"checkbox\" name=\"".$name."[]\" value=\"".htmlspecialchars($value)."\">".htmlspecialchars($text);
    }
    return $return_str;
  }




  /**
   * 2次元配列からCheckBoxタグを配列分作成して返します。
   *
   * @param Array $array 2次元配列
   * @param String $name checkboxタグの名前
   * @param String $checked checkedを付加する値
   * @return String
   */
  function getCheckTag($array, $name, $checked) {

	unset($return_str);

	for ($i = 0; $i < count($array); $i++) {

		$return_str .= "<input type=\"checkbox\" name=\"".$name."[]\" value=\"".$array[$i][0]."\"";

		$flg = "";
		if ( is_array($checked) ) {
			foreach ($checked as $key => $val) {

				if ($array[$i][0] == $val) {
					$flg = "1";
					break;
				}

			}
		}


      if ($flg) {
        $return_str = $return_str." checked>";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str." ";
      } else {
        $return_str = $return_str.">";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str." ";
      }
    }

    return $return_str;
  }
  /**
   * 2次元配列からCheckBoxタグを配列分作成して返します。
   *
   * @param Array $array 2次元配列
   * @param String $name checkboxタグの名前
   * @param String $checked checkedを付加する値
   * @return String
   */
  function getCheckTagTableCustom($array, $name, $checked,$str) {

	unset($return_str);
	if(is_array($array)){
		foreach($array as $key => $value){
			$len += strlen($value)+4;
     		 	if($len>$str){
     		 		$len = 0;
     		 		$return_str .= "</ul><ul>\n";
     		 	}
			$return_str .= "<li><input type=\"checkbox\" name=\"".$name."[]\" value=\"".$key."\"";
			$flg = "";
			if ( is_array($checked) ) {
				foreach ($checked as $val) {
					if ($key == $val) {
						$flg = "1";
						break;
					}
				}
			}
     	 		if ($flg) {
        				$return_str = $return_str." checked>\n";
        				$return_str = $return_str.htmlspecialchars($value);
        				$return_str = $return_str."</li>";
      			} else {
        				$return_str = $return_str.">\n";
        				$return_str = $return_str.htmlspecialchars($value);
        				$return_str = $return_str."</li>";
     		 	}
		}
	}

    return $return_str;
  }
   /**
   * 2次元配列からCheckBoxタグを配列分作成して返します。
   *
   * @param Array $array 2次元配列
   * @param String $name checkboxタグの名前
   * @param String $checked checkedを付加する値
   * @return String
   */
  function getCheckTagTableCustom2($array, $name, $checked,$str) {

	unset($return_str);
	if(is_array($array)){
		foreach($array as $key => $value){
			$len += strlen($value);
     		 	if($len>$str){
     		 		$len = 0;
     		 		$return_str .= "<br />\n";
     		 	}
			$return_str .= " <input type=\"checkbox\" name=\"".$name."[]\" value=\"".$key."\"";
			$flg = "";
			if ( is_array($checked) ) {
				foreach ($checked as $val) {
					if ($key == $val) {
						$flg = "1";
						break;
					}
				}
			}
     	 		if ($flg) {
        				$return_str = $return_str." checked>\n";
        				$return_str = $return_str.htmlspecialchars($value);
        				$return_str = $return_str."　";
      			} else {
        				$return_str = $return_str.">\n";
        				$return_str = $return_str.htmlspecialchars($value);
        				$return_str = $return_str."　";
     		 	}
		}
	}

    return $return_str;
  }


  /**
   * 第1引数で指定されたフォルダ内のファイルを第2引数の条件で削除します。
   * 
   * @param String $arg 対象フォルダの絶対パス
   * @param int $arg2 現在日付より何秒前までの作成日時を許容するか
   */
  function cleanFolder($arg, $arg2) {
    $handle = opendir($arg);
    while ($file = readdir($handle)) {
      // 自分自身と上位階層のディレクトリを除外
      if( $file != "." && $file != ".." ) {
        if ((filectime($arg."/".$file) + $arg2) < strtotime(now)) {
          unlink($arg."/".$file);
        }
      }
    }
  }


  /**
   * エラーメッセージをprintします。
   * 
   * @param array $error エラーメッセージ配列
   * @return void
   */
  function printErrorMsg($error) {
    $admin_img_url = ROOT_PATH . '/common/img/';
echo <<<END
    <table border="0" cellspacing="0" cellpadding="0" width="480">
      <tr>
        <td colspan="3" bgcolor="#EED6B5"></td>
      </tr>
      <tr>
        <td bgcolor="#EED6B5"><img src="{$admin_img_url}/spacer.gif" width="1" height="1"></td>
        <td align=center bgcolor="#F7F0E6" width="500">
          <table border="0" cellspacing="0" cellpadding="7">
            <tr>
              <td><img src="{$admin_img_url}/alert.gif" vspace="5"></td>
              <td><strong><font color="#DD0000">
END;
    foreach($error as $str) {
      print($str."<br>");
    }
echo <<<END
                          </font></strong></td>
            </tr>
          </table>
        </td>
        <td bgcolor="#996600"><img src="{$admin_img_url}/spacer.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#996600"></td>
      </tr>
    </table>
END;
  }

  /**
   * エラーメッセージをprintします。
   * 
   * @param array $error エラーメッセージ配列
   * @return void
   */
  function printMsg($msg) {
    $admin_img_url = ROOT_PATH . '/common/img/';
echo <<<END
    <table border="0" cellspacing="0" cellpadding="0" width="480">
      <tr>
        <td colspan="3" bgcolor="#EED6B5"></td>
      </tr>
      <tr>
        <td bgcolor="#EED6B5"><img src="{$admin_img_url}/spacer.gif" width="1" height="1"></td>
        <td align=center bgcolor="#F7F0E6" width="500">
          <table border="0" cellspacing="0" cellpadding="7">
            <tr>
              <td><img src="{$admin_img_url}/spacer.gif" vspace="5"></td>
              <td><strong><font color="#DD0000">
END;
    foreach($msg as $str) {
      print($str."<br>");
    }
echo <<<END
                          </font></strong></td>
            </tr>
          </table>
        </td>
        <td bgcolor="#996600"><img src="{$admin_img_url}/spacer.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#996600"></td>
      </tr>
    </table>
END;
  }

  /**
   * imgタグをprintします。(画像、バナー表示用)
   * 
   * @param array $arg [0] => 画像名(パス含む) [1] => リンク先URL [2] => リンク方法フラグ [3] => バナーキャプション
   * @return void
   */
  function printImgTag($arg) {
    if (strlen($arg[1])) {
      if ($arg[2] == "1") {
        print "<a href=\"".htmlspecialchars($arg[1])."\"><img src=\"".htmlspecialchars($arg[0])."\" border=\"0\" alt=\"".htmlspecialchars($arg[3])."\"></a>";
      } else {
        print "<a href=\"".htmlspecialchars($arg[1])."\" target=\"_blank\"><img src=\"".htmlspecialchars($arg[0])."\" border=\"0\" alt=\"".htmlspecialchars($arg[3])."\"></a>";
      }
    } else {
        print "<img src=\"".htmlspecialchars($arg[0])."\" border=\"0\" alt=\"".htmlspecialchars($arg[3])."\">";
    }
  }
  function printImgTagMobile($arg) {
    if (strlen($arg[1])) {
      if ($arg[2] == "1") {
        print "<a href=\"".htmlspecialchars($arg[1])."\"><img src=\"".htmlspecialchars($arg[0])."\" border=\"0\" alt=\"".htmlspecialchars(mb_convert_encoding($arg[3], "SJIS", "EUC-JP"))."\"></a>";
      } else {
        print "<a href=\"".htmlspecialchars($arg[1])."\" target=\"_blank\"><img src=\"".htmlspecialchars($arg[0])."\" border=\"0\" alt=\"".htmlspecialchars(mb_convert_encoding($arg[3], "SJIS", "EUC-JP"))."\"></a>";
      }
    } else {
        print "<img src=\"".htmlspecialchars($arg[0])."\" border=\"0\" alt=\"".htmlspecialchars(mb_convert_encoding($arg[3], "SJIS", "EUC-JP"))."\">";
    }
  }

 
  /**
   * 画像をリサイズして保存します。
   * JPG, GIFに対応しています。
   * 
   * @param String $filename1 リサイズ対象ファイル名
   * @param String $filename2 保存ファイル名
   * @param int $resize_x リサイズ後の横サイズ
   * @return void
   */
  function resizeXImg($filename1, $filename2, $resize_x) {
    $filename_array = pathinfo($filename1);
    $extension      = strtolower($filename_array["extension"]);
    if ($extension == "jpeg" || $extension == "jpg") {
      $image = imagecreatefromjpeg($filename1);
    } else if ($extension == "gif") {
      $image = imagecreatefromgif($filename1);
    }

    $x     = imagesx($image);   // 読み込んだ画像の横サイズを取得
    $y     = imagesy($image);   // 読み込んだ画像の縦サイズを取得
    $rx    = $resize_x;         // サイズ変更後の横サイズ
    $ry    = ($rx * $y) / $x;   // サイズ変更後の横サイズ

    // TrueColorイメージを新規に作成
    if ($extension == "jpeg" || $extension == "jpg") {
      $new_image = imagecreatetruecolor($rx, (int)$ry);
    } else if ($extension == "gif") {
      $new_image = imagecreate($rx, (int)$ry);
    }

    // 画像の一部の複製とサイズ変更
//    imagecopyresized($new_image, $image, 0, 0, 0, 0, $rx, (int)$ry, $x, $y);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $rx, (int)$ry, $x, $y);

    // 画像をファイルに出力
    if ($extension == "jpeg" || $extension == "jpg") {
      imagejpeg($new_image, $filename2);
    } else if ($extension == "gif") {
      imagegif($new_image, $filename2);
    }

    // メモリの解放
    imagedestroy($image);
    imagedestroy($new_image);
  }
  /**
   * 画像をリサイズして保存します。
   * JPG, GIFに対応しています。
   * 
   * @param String $filename1 リサイズ対象ファイル名
   * @param String $filename2 保存ファイル名
   * @param int $resize_x リサイズ後の縦横最大サイズ
   * @return void
   */
  function resizeImg($filename1, $filename2, $resize) {
    $filename_array = pathinfo($filename1);
    $extension      = strtolower($filename_array["extension"]);
    if ($extension == "jpeg" || $extension == "jpg") {
      $image = imagecreatefromjpeg($filename1);
    } else if ($extension == "gif") {
      $image = imagecreatefromgif($filename1);
    }

    $x     = imagesx($image);   // 読み込んだ画像の横サイズを取得
    $y     = imagesy($image);   // 読み込んだ画像の縦サイズを取得
    if($x<$y){
    	$ry = $resize;
    	$rx = ($ry * $x) / $y;	
    }else{
    	$rx    = $resize;         // サイズ変更後の横サイズ
    	$ry    = ($rx * $y) / $x;   // サイズ変更後の横サイズ
    }

    // TrueColorイメージを新規に作成
    if ($extension == "jpeg" || $extension == "jpg") {
      $new_image = imagecreatetruecolor((int)$rx, (int)$ry);
    } else if ($extension == "gif") {
      $new_image = imagecreate((int)$rx, (int)$ry);
    }

    // 画像の一部の複製とサイズ変更
//    imagecopyresized($new_image, $image, 0, 0, 0, 0, $rx, (int)$ry, $x, $y);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, (int)$rx, (int)$ry, $x, $y);

    // 画像をファイルに出力
    if ($extension == "jpeg" || $extension == "jpg") {
      imagejpeg($new_image, $filename2);
    } else if ($extension == "gif") {
      imagegif($new_image, $filename2);
    }

    // メモリの解放
    imagedestroy($image);
    imagedestroy($new_image);
  }
  /** 
   * ページングのリンクテキストを返します。
   * 
   * @param $count 件数
   * @param $page 表示するページ番号
   * @param $number 1ページに表示させる件数
   * @param $forward 遷移先のURL
   * @param $option 追加のGETパラメータ "&xxx=yyy&..."形式
   * @return String
   */
  function getPagingLink($count, $page, $number, $forward, $option) {
    // 総ページ数を決定する
    $ans = floor($count / $number);
    $rest = $count % $number;
    if ($rest != 0) {
      $ans = $ans + 1;
    } else {
      // 総ページ数が$numberで割り切れた場合、最後の手前のページでは「次の$number件」にするため$restに$numberをセットする
      $rest = $number;
    }
    // 最後の手前のページ数
    $before_last = $ans - 1;

    // ページングが必要かどうか
    if ($count >= $number + 1) {
      $start = (($page - 1) * $number) + 1;
      // 初回表示($page == null)でない、且つ、1でなければ「前の$number件」を表示する
      if ($page != null && $page != 1) {
        $front = $page - 1;
        $front_paging_link = "<a href=\"#\" onclick=\"document.forms['form1'].action='".$forward."?page=".$front.$option."';document.forms['form1'].submit();\">前の".$number."件&lt;&lt;</a>";
      }
      //クリックされたページが、最後の手前のページの場合「次のXX件」を表示する
      if ($before_last == $page) {
        $next = $page + 1;
        $end_paging_link = "<a href=\"#\" onclick=\"document.forms['form1'].action='".$forward."?page=".$next.$option."';document.forms['form1'].submit();\">&gt;&gt;次の".$rest."件</a>";
        $end   = $page * $number;
      // チェックされたページが最後のページでなければ「次の100件」を表示する
      } else if ($ans != $page) {
        $next = $page + 1;
        $end_paging_link = "<a href=\"#\" onclick=\"document.forms['form1'].action='".$forward."?page=".$next.$option."';document.forms['form1'].submit();\">&gt;&gt;次の".$number."件</a>";
        $end   = $page * $number;
      } else {
        $end   = $count;
      }
      if (!strlen($front_paging_link)) {
        $front_paging_link = "<img src=\"".ROOT_PATH . '/common/img/'."/spacer.gif\" width=\"42\" height=\"1\">";
      }
      $paging_link = $front_paging_link.
                     "<img src=\"".ROOT_PATH . '/common/img/'."/spacer.gif\" width=\"4\" height=\"1\">".
                     $count."件中".
                     "<img src=\"".ROOT_PATH . '/common/img/'."/spacer.gif\" width=\"4\" height=\"1\">".
                     $start.
                     "<img src=\"".ROOT_PATH . '/common/img/'."/spacer.gif\" width=\"4\" height=\"1\">".
                     "～".
                     "<img src=\"".ROOT_PATH . '/common/img/'."/spacer.gif\" width=\"4\" height=\"1\">".
                     $end.
                     "<img src=\"".ROOT_PATH . '/common/img/'."/spacer.gif\" width=\"4\" height=\"1\">".
                     $end_paging_link;
    }
    return $paging_link;
  }

    function getPagingLink2($count, $page, $number, $forward, $option,$topmess="") {
    // 総ページ数を決定する
    $ans = floor($count / $number);
    $rest = $count % $number;
    if ($rest != 0) {
      $ans = $ans + 1;
    } else {
      // 総ページ数が$numberで割り切れた場合、最後の手前のページでは「次の$number件」にするため$restに$numberをセットする
      $rest = $number;
    }
    // 最後の手前のページ数
    $before_last = $ans - 1;

    // ページングが必要かどうか
    if ($count >= $number + 1) {
      $start = (($page - 1) * $number) + 1;
	  // 各ページ番号を返す
	  $min = $page - 6;
	  if($min<0){$min = 0;$oma=6-$page;}
	  $max = $page + 5;
	  if($max>$ans){$oma2 = $max-$ans;$max = $ans;}
	  $max += $oma;
	  $min -= $oma2;
	  if($min<0){$min=0;}
	  if($max>$ans){$max=$ans;}
	  for($i=$min;$i<$max;$i++){
	  	$l = $i+1;
		if($l == $page){
			$paging_count .= "<li class=\"current\">".$l."</li>";
		}else{
			$paging_count .= "<li><a href=\"".$forward."?page=".$l."\">".$l."</a></li>";
		}
	  }
	  
      // 初回表示($page == null)でない、且つ、1でなければ「前の$number件」を表示する
      if ($page != null && $page != 1) {
        $front = $page - 1;
//        $front_paging_link = "<a href=\"".$forward."?page=".$front.$option."\">前の".$number."件<<</a>";
        $front_paging_link = "<li class=\"next\"><a href=\"".$forward."?page=".$front.$option."\">前へ</a></li>";
      }
      //クリックされたページが、最後の手前のページの場合「次のXX件」を表示する
      if ($before_last == $page) {
        $next = $page + 1;
//        $end_paging_link = "<a href=\"".$forward."?page=".$next.$option."\">>>次の".$rest."件</a>";
        $end_paging_link = "<li class=\"next\"><a href=\"".$forward."?page=".$next.$option."\">次へ</a></li>";
        $end   = $page * $number;
      // チェックされたページが最後のページでなければ「次の100件」を表示する
      } else if ($ans != $page) {
        $next = $page + 1;
//        $end_paging_link = "<a href=\"".$forward."?page=".$next.$option."\">>>次の".$number."件</a>";
        $end_paging_link = "<li class=\"next\"><a href=\"".$forward."?page=".$next.$option."\">次へ</a></li>";
        $end   = $page * $number;
      } else {
        $end   = $count;
      }
      if (!strlen($front_paging_link)) {
        $front_paging_link = "";
      }
      if($topmess){      	
        $paging_top = "<li class=\"title\">$topmess:</li>";
      }
      $paging_link = "<p>該当件数は".$count."件（計".$ans."ページ）です。".$start."件 - ".$end."件を表示しています。</p>\n".
			"<ul class=\"paging_link\">\n".
			$paging_top.
			$front_paging_link.
			$paging_count.
			$end_paging_link.
			"</ul>\n";
    }
    return $paging_link;
  }
  
  
  function getWeekArray(){
	$w = date('w',time()); //今日の曜日を取得
	$x = 0-$w; //日曜日まで遡る日数を取得
	for($i=0;$i<12;$i++){
		$f = $x + $i*7;
		$t = $x+6+$i*7;
		$from_time = date("m/d",strtotime("+$f days"));
		$f_time = strtotime($from_time);
		$to_time = date("m/d",strtotime(" +$t days"));
		$array[$f_time] = $from_time."～".$to_time;		
	}
	return $array;	
  }

  /**
   * 文字の長さを返します。
   *
   * @param 文字 $str
   * @param 桁数 $limit
   */
  function getMblen($str,$limit){
	if(mb_strlen($str)*2==strlen($str)){
		if($limit<(mb_strlen($str)*2+2)){
			$rtn = mb_substr($str,0,$limit/2-1);
		}else{
			$rtn = $str;
		}
	}else{
		$cnt = mb_strlen($str);
		if($limit<($cnt*3+1)){
			$len=0;
			$flg=0;
			for($i=0;$i<$cnt;$i++){
				if(strlen(mb_substr($str,$i,1))==2){
					if($flg!=1)$len++;
					$flg = 1;
					$len += 2;
				}else{
					if($flg!=0)$len++;
					$flg=0;
					$len ++;
				}
				if($len>$limit){
					break;
				}
			}
			if($flg==1){
				$rtn = mb_substr($str,0,$i-1);
			}else{
				$rtn = mb_substr($str,0,$i);	
			}
		}else{
			$rtn = $str;
		}
	}
	return $rtn;
  }

  
  function getMbstrlen($str){
  	if(mb_strlen($str)*2==strlen($str)){
  		$len = strlen($str)+2;
  	}elseif(mb_strlen($str)==strlen($str)){
  		$len = strlen($str);
  	}else{
  		$cnt = mb_strlen($str);
  		$len = 0;
  		$flg = 0;
  		for($i=0;$i<$cnt;$i++){
			$val = mb_substr($str,$i,1);
  			if(strlen($val)==2){
  				if($flg!=1)$len++;
  				$flg = 1;
  				$len += 2;
  			}else{
  				if($flg!=0)$len++;
  				$flg = 0;
  				$len++;
  			}
  		}
  		if($flg==1){
  			$len++;
  		}
  	}
  	return $len;
}


/**-------------------------------------------------------------------------------------------------
  携帯サイト
--------------------------------------------------------------------------------------------------*/
  /**
   * 2次元配列からselectタグを作成して返します。
   * $blank_textに文字列をセットすると、
   * 先頭に、[値=""][表示文字="文字列"]のoptionタグが追加されます。
   * $blank_textに""をセットすると、先頭にoptionタグは追加されません。
   * $blank_textに"BLANK"をセットすると、
   * 先頭に、[値=""][表示文字=""]のoptionタグが追加されます。
   *
   * @param Array $array 2次元配列
   * @param String $name selectタグの名前
   * @param int $width selectタグのwidth
   * @param String $selected selectedを付加する値
   * @param String $blank_text 1番目のoptionタグに指定する値
   * @return String
   */
  function getSelectTagMobile($array, $name, $selected, $blank_text) {
    $return_str = "<select name=\"".$name."\">\n";
    if (strlen($blank_text)) {
      if ($blank_text == "BLANK") {
        if (!strlen($selected)) {
          $return_str = $return_str."<option value=\"\" selected>";
        } else {
          $return_str = $return_str."<option value=\"\">";
        }
      } else {
        if (!strlen($selected)) {
          $return_str = $return_str."<option value=\"\" selected>".$blank_text."";
        } else {
          $return_str = $return_str."<option value=\"\">".$blank_text."";
        }
      }
    }

    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i][0] == $selected) {
        $return_str = $return_str."<option value=\"".htmlspecialchars($array[$i][0])."\" selected>";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."";
      } else {
        $return_str = $return_str."<option value=\"".htmlspecialchars($array[$i][0])."\">";
        $return_str = $return_str.htmlspecialchars($array[$i][1]);
        $return_str = $return_str."";
      }
    }
    $return_str = $return_str."</select>\n";
    return $return_str;
  }

  /**
   * 評価をprintします。
   * 
   * @param array $goods_estimation 商品評価
   * @return String
   */
  function printEstimationMobile($goods_estimation) {
    for ($i = 0; $i < $goods_estimation; $i++) {
      $str = $str.mb_convert_encoding("★", "SJIS", "EUC-JP");
    }
    while ($i < 5) {
      $str = $str.mb_convert_encoding("☆", "SJIS", "EUC-JP");
      $i++;
    }
    print($str);
  }

  /** 
   * ページングのリンクテキストを返します。
   * 
   * @param $count 件数
   * @param $page 表示するページ番号
   * @param $number 1ページに表示させる件数
   * @param $forward 遷移先のURL
   * @param $option 追加のGETパラメータ "&xxx=yyy&..."形式
   * @return String
   */
  function getPagingLinkMobile($count, $page, $number, $forward, $option) {
    // 総ページ数を決定する
    $ans = floor($count / $number);
    $rest = $count % $number;
    if ($rest != 0) {
      $ans = $ans + 1;
    } else {
      // 総ページ数が$numberで割り切れた場合、最後の手前のページでは「次の$number件」にするため$restに$numberをセットする
      $rest = $number;
    }
    // 最後の手前のページ数
    $before_last = $ans - 1;

    // ページングが必要かどうか
    if ($count >= $number + 1) {
      $start = (($page - 1) * $number) + 1;
      // 初回表示($page == null)でない、且つ、1でなければ「前の$number件」を表示する
      if ($page != null && $page != 1) {
        $front = $page - 1;
        $front_paging_link = "<a href=\"".$forward."?page=".$front.$option."\">前の".$number."件</a>";
      }
      //クリックされたページが、最後の手前のページの場合「次のXX件」を表示する
      if ($before_last == $page) {
        $next = $page + 1;
        $end_paging_link = "<a href=\"".$forward."?page=".$next.$option."\">次の".$rest."件</a>";
        $end   = $page * $number;
      // チェックされたページが最後のページでなければ「次の100件」を表示する
      } else if ($ans != $page) {
        $next = $page + 1;
        $end_paging_link = "<a href=\"".$forward."?page=".$next.$option."\">次の".$number."件</a>";
        $end   = $page * $number;
      } else {
        $end   = $count;
      }
      $paging_link = $front_paging_link.
                     "<img src=\"".IMG_URL."/spacer.gif\" width=\"4\" height=\"1\">".
                     $count."件中".
                     "<img src=\"".IMG_URL."/spacer.gif\" width=\"4\" height=\"1\">".
                     $start.
                     "<img src=\"".IMG_URL."/spacer.gif\" width=\"4\" height=\"1\">".
                     "～".
                     "<img src=\"".IMG_URL."/spacer.gif\" width=\"4\" height=\"1\">".
                     $end.
                     "<img src=\"".IMG_URL."/spacer.gif\" width=\"4\" height=\"1\">".
                     $end_paging_link;
    }
    return mb_convert_encoding($paging_link, "SJIS", "EUC-JP");
  }

  /**
   * テキストボックスの入力制御をするため文字列を返します。
   * 
   * @param String $type 制御タイプ
   * @return String
   */
  function getMobileStyle($arg) {
  		$agent = $_SERVER['HTTP_USER_AGENT']; 
		if(ereg("^DoCoMo", $agent)){
		      // i-mode用入力制御
		      if ($arg == "1") {
		        // 全角かな
		        return "istyle=\"1\"";
		      } else if ($arg == "2") {
		        // 英字
		        return "istyle=\"3\"";
		      } else if ($arg == "3") {
		        // 数字
		        return "istyle=\"4\"";
		      } else {
		        return "";
		      }
		}else if(ereg("^J-PHONE|^Vodafone|^SoftBank|^MOT-", $agent)){
		      // j-sky用入力制御
		      if ($arg == "1") {
		        // 全角かな
		        return "MODE=\"hiragana\"";
		      } else if ($arg == "2") {
		        // 英字
		        return "MODE=\"alphabet\"";
		      } else if ($arg == "3") {
		        // 数字
		        return "MODE=\"numeric\"";
		      } else {
		        return "";
		      }
		}else if(ereg("^UP.Browser|^KDDI", $agent)){
		      // Ezweb用入力制御
		      if ($arg == "1") {
		        // 全角かな
		        return "FORMAT=\"*M\"";
		      } else if ($arg == "2") {
		        // 英字
		        return "FORMAT=\"*m\"";
		      } else if ($arg == "3") {
		        // 数字
		        return "FORMAT=\"*N\"";
		      } else {
		        return "";
		      }
		    } else {
		      return "";
		    }		
  }
  

  function SanitizeForDisp($text,$isTagReplace=false,$isNl2Br=true)
  {
  	//$ret = nl2br(htmlspecialchars(stripslashes($text)));		2007.08.24 TERA Disp2と同様にした
  	$ret = htmlspecialchars(stripslashes($text));
  
  	if ($isTagReplace) {
  		// 2007.07.01 TERA
  		$pat = "(https?:\/\/[-_.!~*'()a-zA-Z0-9;/?:@&=+$,%#]+)";	//検出パターン
  		$rep = "<a href=\"\\1\" target=\"_blank\">\\1</a>";		//置換パターン
  		$ret = ereg_replace($pat, $rep, $ret);
    	}
  
  	if ($isNl2Br) {
  		$ret = nl2br($ret);
  	}
  	return $ret;
  }

  /**
   * オーダー名称を返します
   * 
   * @param String $type  オーダー区分
   * @return String
   */
  function getOrderKbn($odkb) {
    $ret = "";
    switch($odkb){
        case 1:
            $ret = "一般";
            break;
        case 2:
            $ret = "部品";
            break;
        case 3:
            $ret = "サービス";
            break;
        case 4:
            $ret = "仕込";
            break;
        case 5:
            $ret = "試作";
            break;
    }
    return $ret;
  }

  /**
   * 船用／陸用名称を返します
   * 
   * @param String $type  船用／陸用区分
   * @return String
   */
  function getShipKbn($frkb) {
    $ret = "";
    switch($frkb){
        case 1:
            $ret = "船用";
            break;
        case 2:
            $ret = "陸用";
            break;
    }
    return $ret;
  }

   /**
   * 国内／輸出名称を返します
   * 
   * @param String $type  国内／輸出区分
   * @return String
   */
  function getInternalKbn($inkb) {
    $ret = "";
    switch($inkb){
        case 1:
            $ret = "国内";
            break;
        case 2:
            $ret = "輸出";
            break;
        case 3:
            $ret = "間接輸出";
            break;
    }
    return $ret;
  }

   /**
   * 契約金名称を返します
   * 
   * @param String $type  契約金区分
   * @return String
   */
  function getAgreementKbn($agkb) {
    $ret = "";
    switch($agkb){
        case 0:
            $ret = "決定";
            break;
    }
    return $ret;
  }

   /**
   * 入金区分名称を返します
   * 
   * @param String $type  入金区分
   * @return String
   */
  function getPaymentKbn($pmkb) {
    $ret = "";
    switch($pmkb){
        case 1:
            $ret = "現金";
            break;
        case 2:
            $ret = "相殺";
            break;
        case 3:
            $ret = "手形";
            break;
    }
    return $ret;
  }

   /**
   * 絶縁区分名称を返します
   * 
   * @param String $type  絶縁区分
   * @return String
   */
  function getZetuenKbn($zekb) {
    $ret = "";
    switch($zekb){
        case 'B':
            $ret = "B";
            break;
        case 'E':
            $ret = "Ｅ";
            break;
        case 'F':
            $ret = "Ｆ";
            break;
        case 'H':
            $ret = "Ｈ";
            break;
        case 'J':
            $ret = "新 JFM";
            break;
    }
    return $ret;
  }
  
   /**
   * 周波数区分名称を返します
   * 
   * @param String $type  周波数区分
   * @return String
   */
  function getPalsKbn($plkb) {
    $ret = "";
    switch($plkb){
        case 1:
            $ret = "６０ＨＺ";
            break;
        case 2:
            $ret = "５０ＨＺ";
            break;
        case 3:
            $ret = "５０／６０ＨＺ";
            break;
    }
    return $ret;
  }

   /**
   * 相数区分名称を返します
   * 
   * @param String $type  相数区分
   * @return String
   */
  function getSousuuKbn($sokb) {
    $ret = "";
    switch($sokb){
        case 1:
            $ret = "単相";
            break;
        case 2:
            $ret = "３相";
            break;
        case 3:
            $ret = "３相４線";
            break;
    }
    return $ret;
  }

     /**
   * 所管区分名称を返します
   * 
   * @param String $type  所管区分
   * @return String
   */
  function getSyokanKbn($sykb) {
    $ret = "";
    switch($sykb){
        case 1:
            $ret = "本社";
            break;
        case 2:
            $ret = "岐阜";
            break;
        case 3:
            $ret = "回転機";
            break;
        case 4:
            $ret = "制御機器";
            break;
        case 5:
            $ret = "羽島";
            break;
        case 6:
            $ret = "可児";
            break;
        case 7:
            $ret = "旧日南";
            break;
        case 8:
            $ret = "システム";
            break;
        case 9:
            $ret = "消費税";
            break;
    }
    return $ret;
  }

   /**
   * 作成区分名称を返します
   * 
   * @param String $type  作成区分
   * @return String
   */
  function getSakuseiKbn($skkb) {
    $ret = "";
    switch($skkb){
        case 1:
            $ret = "製作";
            break;
        case 2:
            $ret = "充当";
            break;
        case 3:
            $ret = "修理";
            break;
        case 4:
            $ret = "受験";
            break;
        case 5:
            $ret = "サービス";
            break;
    }
    return $ret;
  }

   /**
   * 売上区分名称を返します
   * 
   * @param String $type  売上区分
   * @return String
   */
  function getUriageKbn($urkb) {
    $ret = "";
    switch($urkb){
        case 0:
            $ret = "売上";
            break;
        case 1:
            $ret = "非売上";
            break;
    }
    return $ret;
  }  

   /**
   * シリーズ船区分名称を返します
   * 
   * @param String $type  シリーズ船区分
   * @return String
   */
  function getSeriesKbn($srkb) {
    $ret = "";
    switch($srkb){
        case 1:
            $ret = "シリーズ船";
            break;
        case 2:
            $ret = "同仕様船";
            break;
    }
    return $ret;
  }  

   /**
   * 日付をyyyy/mm/dd形式で返します
   * 
   * @return String
   */
  function getStrDate($yymm,$dd) {
    $ret = "";
    if (is_numeric($yymm)){
        if ($yymm >0){
            $ret = floor($yymm / 100)."/".floor($yymm % 100)."/".$dd;
        }
    }
    return $ret;
  }  
   /**
   * 日付をyyyy/mm/dd形式で返します
   * 
   * @return String
   */
  function getStrDateFull($yymmdd) {
    $ret = "";
    if (is_numeric($yymmdd)){
        if ($yymmdd >0){
            $ret = floor($yymmdd / 10000)."/".sprintf("%02d",floor(($yymmdd - (floor($yymmdd / 10000) * 10000))  / 100))."/".sprintf("%02d",floor($yymmdd % 100));
        }
    }
    return $ret;
  }  
   /**
   * 日付をyyyy/mm形式で返します
   * 
   * @return String
   */
  function getStrDateMini($yymm) {
    $ret = "";
    if (is_numeric($yymm)){
        if ($yymm >0){
            $ret = floor($yymm / 100)."/".floor($yymm % 100);
        }
    }
    return $ret;
  }  

   /**
   * オーダーNoをNN-NNNN-NN形式で返します
   * 
   * @return String
   */
  function getOderNo($odno) {
    $ret = "";
    if (is_numeric($odno)){
        if ($odno > 0){
            $odno1 = floor($odno / 1000000);
            $ret = sprintf("%02d",$odno1)."-";
            $odno2 = floor(($odno - ($odno1 * 1000000)) / 100);
            $ret .= sprintf("%04d",$odno2)."-";
            $odno3 = floor($odno % 100);
            $ret .= sprintf("%02d",$odno3);
        }
    }
    return $ret;
  }  

  function getOderNo2($odno) {
    $ret = "";
    if (is_numeric($odno)){
        if ($odno > 0){
            $odno1 = floor($odno / 10000);
            $ret = sprintf("%02d",$odno1)."-";
            $odno2 = $odno - ($odno1 * 10000);
            $ret .= sprintf("%04d",$odno2);
        }
    }
    return $ret;
  }  
  
   /**
   * 提出図面部数～名称を返します
   * 
   * @param String $type  提出～区分
   * @return String
   */
  function getTeisyutuKbn($tskb) {
    $ret = "";
    switch($tskb){
        case 1:
            $ret = "スペックによる";
            break;
        case 2:
            $ret = "当オーダーによる";
            break;
    }
    return $ret;
  }  

   /**
   * 整理番号NNNN-NN形式で返します
   * 
   * @return String
   */
    function getSeiriNo($srno) {
    $ret = "";
    if (is_numeric($srno)){
        if ($srno > 0){
            if ($srno >= 1000){
                $srno1 = floor($srno / 1000);
                $ret = sprintf("%04d",$srno1)."-";
            }
            $srno2 = $srno - ($srno1 * 1000);
            $ret .= sprintf("%03d",$srno2);
        }
    }
    return $ret;
  }  

   /**
   * 売上伝票No0000形式で返します
   * 
   * @return String
   */
    function getUriageNo($urno) {
    $ret = "";
    if (is_numeric($urno)){
            $ret .= sprintf("%04d",$urno);
    }
    return $ret;
  }  

// 群馬工場用--------------------------------------  
  /**
   * 材質を返します
   * 
   * @param String $type  材質
   * @return String
   */
  function getMaterialKbn($zist) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'ZIST';
    $where['SYKEY1 = ?'] = $zist;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  

  /**
   * 部品処理を返します
   * 
   * @param String $type  部品処理
   * @return String
   */
  function getPartsKbn($ptsk) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'PTSK';
    $where['SYKEY1 = ?'] = $ptsk;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  
  
  /**
   * 科目を返します
   * 
   * @param String $type  科目
   * @return String
   */
  function getKamokuKbn($kmcd) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'KMCD';
    $where['SYKEY1 = ?'] = $kmcd;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  
  
  /**
   * 単位を返します
   * 
   * @param String $type  単位
   * @return String
   */
  function getTaniKbn($tani) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'TANI';
    $where['SYKEY1 = ?'] = $tani;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  

  /**
   * 構成区分を返します
   * 
   * @param String $type  構成区分
   * @return String
   */
  function getKouseiKbn($kskn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'KSKB';
    $where['SYKEY1 = ?'] = $kskn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  
  
  /**
   * 製造元区分を返します
   * 
   * @param String $type  製造元区分
   * @return String
   */
  function getSeizoumotoKbn($szkn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'SMKB';
    $where['SYKEY1 = ?'] = $szkn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  

  /**
   * 形状区分を返します
   * 
   * @param String $type  形状区分
   * @return String
   */
  function getKeijyouKbn($kjkn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'KJKB';
    $where['SYKEY1 = ?'] = $kjkn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  

  /**
   * 展開フラグを返します
   * 
   * @param String $type  展開フラグ
   * @return String
   */
  function getTenkaiFlg($tkfg) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'TKFG';
    $where['SYKEY1 = ?'] = $tkfg;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  

  /**
   * 支給区分を返します
   * 
   * @param String $type  支給区分
   * @return String
   */
  function getSikyuKbn($skkn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'SKKB';
    $where['SYKEY1 = ?'] = $skkn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  

  /**
   * 発注区分を返します
   * 
   * @param String $type  発注区分
   * @return String
   */
  function getHachuuKbn($hckn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'HTKB';
    $where['SYKEY1 = ?'] = $hckn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  
  
  /**
   * 発注単位を返します
   * 
   * @param String $type  発注単位
   * @return String
   */
  function getHachuuUnit($hckn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'HCTN';
    $where['SYKEY1 = ?'] = $hckn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }  
    
  /**
   * 丸め日数区分を返します
   * 
   * @param String $type  丸め日数区分
   * @return String
   */
  function getRoundKbn($hckn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'MDKB';
    $where['SYKEY1 = ?'] = $hckn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }

  /**
   * 工場区分を返します
   *
   * @param String $type  丸め日数区分
   * @return String
   */
  function getKojoKbn($hckn) {
    $ret = "";
    $dbmaster = new DBMASTER('KYMSYP00');
    $where = array();
    $where['SYDLKB <> ?'] = 'D';
    $where['SYRESC = ?'] = 'SHKJ';
    $where['SYKEY1 = ?'] = $hckn;
    $order = array();
    $target = array('SYMA1X' => 'TRIM(SYMA1X)');
    $dbmaster->setSelect($where, $order, $target);
    return $dbmaster->fetchOne();
  }

  function ArrayFunc($function, $array)
  {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array[$key] = $this->ArrayFunc($function, $value);
        }
        return $array;
    } else {
        return $function($array);
    }
  }
  
  /**
   * チェックデジット　（モジュラス10）
   * @param <type> $n
   * @return <type> 
   */
  function dgt($n)
  {
     $f=0;
     $g=0;
     $k=0;
     $res=explode(',',chunk_split($n,1,','));
     for($ii=count($res)-1;$ii>-1;$ii--){
        $x=intval($res[$ii]);
        if($f==0){
            $k+=$x;
            $f=1;
        }else{
            $g+=$x;
            $f=0;
        }
     }
     return substr(strval(10-intval(substr(strval($g*3+$k), -1))),-1);
  }

  function getSSMHMP00($hmcd)
  {
    $dbmaster = new DBMASTER('SSMHMP00');
    $where = array();
    $where['HMDLKB <> ?'] = 'D';
    $where['HMHMCD = ?'] = $hmcd;
    $order = array();
    $dbmaster->setSelect($where);
    return $dbmaster->fetchRow();
  }

  function getZUMSKP00($sokc)
  {
    $dbmaster = new DBMASTER('ZUMSKP00');
    $where = array();
    $where['SKDLKB <> ?'] = 'D';
    $where['SKSKCD = ?'] = $sokc;
    $dbmaster->setSelect($where);
    return $dbmaster->fetchRow();
  }

  // レートを返します
  function getRate($tuka)
  {
    //$dbmaster = new DBMASTER('GAIKAP');
    
    $dbmaster = new DBMASTER(new Zend_Db_Expr('TAILML/GAIKAP'));

    $where = array();
    $where['GATUCD = ?'] = $tuka;
    $where['GARSTD <= ?'] = date('Ymd');
    $where['GAREND >= ?'] = date('Ymd');
    $select = $dbmaster->setSelect($where, '', 'GARATE');
    return $dbmaster->fetchOne();
  }

  function checkDB2Length($arg) {
      $length = 0;
      $flg = FALSE;
      $str = mb_convert_encoding($arg, "SJIS-WIN", "UTF-8");
      for ($i=0; $i<mb_strlen($str, "SJIS-WIN"); $i++) {
          $getStr = mb_substr($str, $i, 1, "SJIS-WIN");
          if (mb_strwidth($getStr, "SJIS-WIN")==2) {
              if (!$flg) {
                  $length++;
                  $flg = !$flg;
              }
              $flg = TRUE;
              $length += 2;
          } else {
              if ($flg) {
                  $length++;
              }
              $length += 1;
              $flg = FALSE;
          }
      }
      if($flg) $length++;
      return $length;
    }

  function splitDB2Length($arg, $len) {
      $length = $m = 0;
      $flg = FALSE;
      $str = mb_convert_encoding($arg, "SJIS-WIN", "UTF-8");
      for ($i=0; $i<mb_strlen($str, "SJIS-WIN"); $i++) {
          $getStr = mb_substr($str, $i, 1, "SJIS-WIN");
          if (mb_strwidth($getStr, "SJIS-WIN")==2) {
              if (($flg && $length > $len-3) || (!$flg && $length > $len-4)) {
                  $array[] = mb_convert_encoding($bstr, "UTF-8", "SJIS-WIN");
                  $length = 0;
                  $bstr = '';
              }
              if (!$flg) {
                  $length++;
                  $flg = !$flg;
              }
              $flg = TRUE;
              $length += 2;
              $bstr .= $getStr;
          } else {
              if (($flg && $length >= $len-1) || (!$flg && $length >= $len)) {
                  $array[] = mb_convert_encoding($bstr, "UTF-8", "SJIS-WIN");
                  $length = 0;
                  $bstr = '';
              }
              if ($flg) {
                  $length++;
              }
              $length += 1;
              $flg = FALSE;
              $bstr .= $getStr;
          }
          $m++;
      }
      if($flg) $length++;
      $array[] = mb_convert_encoding($bstr, "UTF-8", "SJIS-WIN");
      return $array;
    }

    function mbConvert($array, $number='')
    {
        foreach ($array as $key => $val) {
            if($number[$key]) {
                $array[$key] = sprintf('%' . $number[$key] . 'f', $val);
            } else {
                $array[$key] = mb_convert_encoding($val, 'sjis-win');
            }
        }
        return $array;
    }
}
?>