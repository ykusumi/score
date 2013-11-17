<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン画面</title>
     <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
     <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
     <link rel="stylesheet" href="./common/css/common.css" />
     <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
     <script src="./common/js/common.js"></script>
</head>
<body style="padding-top:40px">
<div class="container">
	<form class="form-horizontal" action="./score.php" method="post">
		<div class="control-group">
			<label class="control-label" for="email">User</label>
				<div class="controls">
					<input type="text" id="name" name="username">
				</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="submit" value="Sign in" class="btn">
			</div>
		</div>
	</form>
</div>
 
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
</body>
</html>