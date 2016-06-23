<?php
session_start();
$_SESSION['lastPage'] = 'forumSec.php';
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}

$server = "127.0.0.1";
$user_name = "root";
$password = "";
$database = "web";

$conn = new mysqli($server, $user_name, $password, $database);

$userInfo = array("userID"=>"","fName"=>"","lName"=>"","country"=>"","bDay"=>"","username"=>"","email"=>"",);

if($_SERVER['REQUEST_METHOD'] == "GET"){
	$userID = $_GET['userID'];
	
	$sql = "SELECT first_name, last_name, country, date_of_birth, username, email FROM users WHERE userID = '$userID';";
	if($result = $conn->query($sql)){
		while($row = $result->fetch_assoc()){
			$userInfo['userID'] =  $userID;
			$userInfo['fName'] = $row['first_name'];
			$userInfo['lName'] = $row['last_name'];
			$userInfo['country'] = $row['country'];
			$userInfo['bDay'] = $row['date_of_birth'];
			$userInfo['username'] = $row['username'];
			$userInfo['email'] = $row['email'];
		}
	}
	
	
}

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
		
		<!--resize script-->
		<script src="scripts/resize.js"></script>
		<!--main css
		<link rel="stylesheet" type="text/css" href="css/homepage.css">
		<link rel="stylesheet" href="css/mainCss.css">-->
		<style>
		body {
			padding: 0px;
			margin: 0px;
			background-color: #ffc299;
		}
		.jumbotron {
			margin: 0px;
			margin-top:50px;
			background-color: #cc5200;
			color: white;
			text-align: center;
		}
		.userInfoOkvir{
			margin: 5px;
			max-width: 400px;
			border-radius: 5px;
			border: 5px solid #cc5200;
		}
		.userInfoHead {
			margin: 0px;
			text-align: center;
			background-color: #cc5200;
			font-size: 22px;
			padding: 10px;
			font-weight: bold;
			color: white;
		}
		.userInfoBody {
			margin: 0px;
			background-color: #ff8533;
				
		}
		table {
			color: white;
		}
		td {
			padding: 10px;
		}
		td:first-child {
			text-align: right;
		}
		</style>
	</head>
	<body>
	<?php require "menu.php";?>
		<div class="jumbotron"><h1>User info</h1></div>
		<div class="userInfoOkvir">
			<div class="userInfoHead">
				<h4><?php echo $userInfo['username']; ?></h4>
			</div>
			<div class="userInfoBody">
				<table>
					<tr><td>First name:</td><td><?php echo $userInfo['fName']; ?></td></tr>
					<tr><td>Last name:</td><td><?php echo $userInfo['lName']; ?></td></tr>
					<tr><td>Country:</td><td><?php echo $userInfo['country']; ?></td></tr>
					<tr><td>Date of Birth:</td><td><?php echo $userInfo['bDay']; ?></td></tr>
					<tr><td>e-mail:</td><td><?php echo $userInfo['email']; ?></td></tr>
				</table>
			</div>
		</div>
	</body>
</html>