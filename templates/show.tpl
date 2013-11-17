<!DOCTYPE html>
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
{literal}
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
{/literal}
<body style="padding-top:40px">

<hr>
			{section name=dbList loop=$score}
				ユーザー名：{$score[dbList].USER}<br>{$score[dbList].INNING}イニング<br>{$score[dbList].TOTAL}人目-{$score[dbList].BUTTER}番バッター<br>
				1球目:{$score[dbList].1KYUME}<br>
				2球目:{$score[dbList].2KYUME}<br>
				3球目:{$score[dbList].3KYUME}<br>
				4球目:{$score[dbList].4KYUME}<br>
				5球目:{$score[dbList].5KYUME}<br>
				6球目:{$score[dbList].6KYUME}<br>
				7球目:{$score[dbList].7KYUME}<br>
				8球目:{$score[dbList].8KYUME}<br>
				9球目:{$score[dbList].9KYUME}<br>
				10球目:{$score[dbList].10KYUME}<br>
				11球目:{$score[dbList].11KYUME}<br>
				12球目:{$score[dbList].12KYUME}<br>
				13球目:{$score[dbList].13KYUME}<br>
				14球目:{$score[dbList].14KYUME}<br>
				15球目:{$score[dbList].15KYUME}<br>
				<br>
				
			{/section}

	
</form>
 
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="./common/js/bootstrap.min.js"></script>
</body>
</html>