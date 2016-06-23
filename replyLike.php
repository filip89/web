<?php
if($_SERVER['REQUEST_METHOD'] == "GET"){
	$repID = $_GET['repID'];
	$likedByID = $_GET['userID'];
	$type = $_GET['type'];
}

$server = "127.0.0.1";
$user_name = "root";
$password = "";
$database = "web";

$conn = new mysqli($server, $user_name, $password, $database);

$sql = "INSERT INTO replylikes (repID, likedByID, type) VALUES ('$repID', '$likedByID', '$type');";

$conn->query($sql);

exit();

?>