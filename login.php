<?php
session_start();
$lastPage = $_SESSION['lastPage'];
$user_name = "root";
$password = "";
$database = "web";
$server = "127.0.0.1";

$conn = new mysqli($server, $user_name, $password, $database);

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
}

$sql = "SELECT username, password, userID FROM users";

if($result = $conn->query($sql)){
	if($result->num_rows == 0){
		echo "No such user";
		exit();
	}
	while($row = $result->fetch_assoc()){
		if($row['username'] == $username && $row['password'] == $password){
			$_SESSION['login'] = true;
			$_SESSION['id'] = $row['userID'];
			$_SESSION['username'] = $row['username'];
			header("Location:$lastPage");
		}
	}
}
else {
	echo $conn->error;
}


function test_input($input){
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

?>