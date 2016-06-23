<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}
if($_SERVER['REQUEST_METHOD'] == "GET"){
	$reply = $_GET['reply'];
	$userID = $_GET['userID'];
	$postID = $_GET['postID'];
	$date = date("Y-d-m h-i-s");
}

$server = "127.0.0.1";
$user_name = "root";
$password = "";
$database = "web";

$conn = new mysqli($server, $user_name, $password, $database);

$sql = "INSERT INTO replies (userID, reply, dateCreated, postID) VALUES ('$userID', '$reply', '$date', '$postID')";

if($conn->query($sql)){
	echo $reply . $userID . $postID . $date;
}
else {
	echo "Failed to reply." . $reply . $userID . $postID . $date;
}
?>