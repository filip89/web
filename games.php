<?php
session_start();
$_SESSION['lastPage'] = 'games.php';
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}
?>
<!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<!--resize script-->
	<script src="scripts/resize.js"></script>
	<link rel="stylesheet" href="gaming.css">
	<style>

	</style>
</head>
<body>
<?php require "menu.php"; ?>
	<div class="gameMenu">
		<a href="gameXO.php">X vs. O</a>
		<a href="#">In making...</a>
	</div>
</body>
</html>
