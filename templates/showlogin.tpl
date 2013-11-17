<!DOCTYPE html>
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
			{section name=dbList loop=$nameList}
				<option  value="{$nameList[dbList].LOGINTIME}">{$nameList[dbList].USERNAME}</option>
			{/section}

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
</html>