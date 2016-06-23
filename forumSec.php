<?php
session_start();
$_SESSION['lastPage'] = 'forumSec.php';
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}

if($_SERVER['REQUEST_METHOD']=="GET"){
	$secID = $_GET["secID"];
}
else {
	header("Location:forum.php");
}

$user_name = "root";
$password = "";
$database = "web";
$server = "127.0.0.1";

$posts = array
(
array("postID"=>"","userID"=>"","title"=>"","dateCreated"=>"","username"=>"")
);

$conn = new mysqli($server, $user_name, $password, $database);

$sql = "SELECT posts.postID, posts.title , posts.userID, posts.dateCreated, users.username FROM posts INNER JOIN users ON users.userID = posts.userID WHERE secID = '$secID';";
$conn->query($sql);

if($result = $conn->query($sql)){
	$i = 0;
	while($row = $result->fetch_assoc()){
		$posts[$i]['postID'] = $row['postID'];
		$posts[$i]['userID'] = $row['userID'];
		$posts[$i]['title'] = $row['title'];
		$posts[$i]['dateCreated'] = $row['dateCreated'];
		$posts[$i]['username'] = $row['username'];
		$i++;
	}
}
else {
	echo "Error with database.";
}
$postsNum = count($posts);
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
		<link rel="stylesheet" href="css/forum.css">
		<link rel="stylesheet" href="css/mainCss.css">
		<style>
		</style>
	</head>
	<body>
	<?php require "menu.php";?>
		<table class="forumSec">
			<tr><th>Post</th><th>Author</th><th>Date created</th></tr>
	<?php

		for($i = 0; $i < $postsNum; $i++){
			/*$userID = $posts[$i]['userID'];
			$sql = "SELECT username FROM users WHERE userID=$userID";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$username = $row['username'];*/
			echo "<tr><td><a href='forumPost.php?postID=" . $posts[$i]['postID'] . "'>" . $posts[$i]['title'] . "</a></td><td><a href='userInfo.php?userID=" . $posts[$i]['userID'] . "'>" . $posts[$i]['username'] . "</a></td><td>" . $posts[$i]['dateCreated'] . "</td></tr>";
		}
	?>
		</div>
	</body>
</html>