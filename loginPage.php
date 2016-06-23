<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8"></meta>
	<meta name="viewvport" content="width=device-width, initial-scale=1"></meta>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/mainCss.css">
	<!--resize script-->
	<script src="scripts/resize.js"></script>
	<style>
	.mainDiv {
		max-width: 500px;
		margin: auto;
		margin-top: 200px;
		background-color: black;
		color: white;
		border-radius: 10px;
	}
	form {
		padding: 10px;
	}
	</style>
</head>
<body>
	<div class="mainDiv hid">
		<form class="form-horizontal" action="login.php" method="POST">
			<div class="form-group">
				<label class="col-sm-2 control-label">Username: </label>
				<div class="col-sm-10">
					<input class="form-control" name="username" required></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password: </label>
				<div class="col-sm-10">
					<input class="form-control" type="password" name="password" required></input>
				</div>
			</div>
			<button class="btn btn-default" type="submit" style="float:right;">Ok</button>
			<div style="clear:both"></div>
		</form>
	</div>
</body>
</html>