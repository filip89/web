<?php
session_start();
$user_name = "root";
$password = "";
$database = "web";
$server = "127.0.0.1";

$conn = new mysqli($server, $user_name, $password, $database);

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$firstName = $_POST['fName'];
	$lastName = $_POST['lName'];
	$birthDate = $_POST['bDate'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$country = $_POST['country'];

}
else {
	header("Location:homepage.html");
}
// napravi array sa error...

$sql = "SELECT username FROM users";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
	if($row['username'] == $username){
		echo '{"errorDetail":"Username already taken!","status":'  . 0 . '}';
		exit();
	}
}


$sql = "INSERT INTO users (first_name, last_name, country, username, date_of_birth, email, password) VALUES ('$firstName','$lastName','$country','$username','$birthDate','$email','$password')";

if($conn->query($sql)){
	echo '{"name":"' . $firstName . '","email":"' . $email . '","status":'  . 1 . '}';
}
else {
	echo '{"errorDetail":' . $conn->error . '}';
}


?>