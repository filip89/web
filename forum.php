<?php
session_start();
$_SESSION['lastPage'] = 'forum.php';
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}
$user_name = "root";
$password = "";
$database = "web";
$server = "127.0.0.1";

$conn = new mysqli($server, $user_name, $password, $database);

$sql = "SELECT * FROM forumSec;";
$conn->query($sql);
$secName = array();
$secID = array();
if($result = $conn->query($sql)){
	while($row = $result->fetch_assoc()){
		$secName[] = $row['name'];
		$secID[] = $row['secID'];
	}
}
else {
	echo "Error with database.";
}
$secNum = count($secName);
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
		<link rel="stylesheet" type="text/css" href="css/homepage.css">
		<!--resize script-->
		<script src="scripts/resize.js"></script>
		<!--main css-->
		<link rel="stylesheet" href="css/mainCss.css">
		<link rel="stylesheet" href="css/forum.css">
		<style>		
		</style>
	</head>
	<body>
	<?php require "menu.php";
	?>
		<table class="forumSec">
			<tr><th>Forum sections</th><th>Number of topics</th><th>Last topic</th></tr>
	<?php require "menu.php";
		for($i = 0; $i < $secNum; $i++){
			echo "<tr><td><a href=forumSec.php?secID=$secID[$i]>$secName[$i]<a/></td><td></td><td></td></tr>";
		}
	?>
		</table>
	</body>
</html>