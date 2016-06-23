<?php
session_start();
$_SESSION['lastPage'] = 'forumPost.php';
if(!isset($_SESSION['login'])) {
	header("Location:loginPage.php");
}

if($_SERVER['REQUEST_METHOD']=="GET"){
	$postID = $_GET["postID"];
}
else {
	header("Location:forum.php");
}
//DODAJ dateEdited za post!!
//Uredit dizajn
//Označit ID-om svaki reply i dodat dateCreated/Edited
$user_name = "root";
$password = "";
$database = "web";
$server = "127.0.0.1";

$conn = new mysqli($server, $user_name, $password, $database);

$post = array("postID"=>"","userID"=>"","title"=>"","post"=>"","dateCreated"=>"","username"=>"");
$replys = array
(
array("repID"=>"","userID"=>"","reply"=>"","dateCreated"=>"","username"=>"","likeScore"=>"","active"=>"","likeType"=>"")
);

$sql = "SELECT posts.postID, posts.title, posts.post , posts.userID, posts.dateCreated, users.username FROM posts INNER JOIN users ON users.userID = posts.userID WHERE postID = '$postID';";
$conn->query($sql);

if($result = $conn->query($sql)){
	$rowPost = $result->fetch_assoc();
	$post['postID'] = $rowPost['postID'];
	$post['userID'] = $rowPost['userID'];
	$post['title'] = $rowPost['title'];
	$post['poste'] = $rowPost['post'];
	$post['dateCreated'] = $rowPost['dateCreated'];
	$post['username'] = $rowPost['username'];	
}
else {
	echo "Error with database.";
}
$sql = "SELECT replies.repID, replies.reply , replies.userID, replies.dateCreated, users.username FROM replies INNER JOIN users ON users.userID = replies.userID WHERE postID = '$postID' ORDER BY replies.repID;";
$conn->query($sql);

if($result = $conn->query($sql)){
	if($result->num_rows != 0){
		$i = 0;
	while($rowReplys = $result->fetch_assoc()){
		$replys[$i]['repID'] = $rowReplys['repID'];
		$replys[$i]['userID'] = $rowReplys['userID'];
		$replys[$i]['reply'] = $rowReplys['reply'];
		$replys[$i]['dateCreated'] = $rowReplys['dateCreated'];
		$replys[$i]['username'] = $rowReplys['username'];
		
		$repIDlike = $rowReplys['repID'];
		//TRAŽI JEL LAJKAO I KOLKO IMA LAJKOVA
		$sql = "SELECT * FROM replylikes WHERE type = 'like' AND repID = '$repIDlike'";
		$likeRes = $conn->query($sql);
		$likeNum = $likeRes->num_rows;
		if($likeNum > 0){
			while($likeRow = $likeRes->fetch_assoc()){
				if($likeRow['likedByID'] == $_SESSION['id']){
				$replys[$i]['active'] = "no";
				$replys[$i]['likeType'] = "like";
				break;
				}
				else {
					$replys[$i]['active']= "yes1";
				}
			}
		}
		else {
			$replys[$i]['active'] = "yes2";
			$likeNum = 0;
		}
		
		$sql = "SELECT likedByID  FROM replylikes WHERE type = 'dislike' AND repID = '$repIDlike'";
		$dislikeRes = $conn->query($sql);
		$dislikeNum = $dislikeRes->num_rows;
		
		if($dislikeNum > 0){
			if($replys[$i]['active'] != "no"){
				while($likeRow = $dislikeRes->fetch_assoc()){
				
					if($likeRow['likedByID'] == $_SESSION['id']){
						$replys[$i]['active'] = "no";
						$replys[$i]['likeType'] = "dislike";
						break;
					}
					else {
						$replys[$i]['active'] = "yes3";
					}
				}
			}
		}
		else {
			$dislikeNum = 0;
		}
	
	
		$likeScore = $likeNum - $dislikeNum;
		
		$replys[$i]['likeScore'] = $likeScore;
		$i++;
	}
	$replysNum = count($replys);
	}
}
else {
	echo "Error with database.";
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
		<link rel="stylesheet" type="text/css" href="css/homepage.css">
		<!--resize script-->
		<script src="scripts/resize.js"></script>
		<script src='scripts/forum.js'></script>
		<!--main css-->
		<link rel="stylesheet" href="css/forum.css">
		<link rel="stylesheet" href="css/mainCss.css">
		<style>
		</style>
	</head>
	<body>
	<?php require "menu.php";
		echo "<table class='forumSec'>";
		echo "<tr><th>" . $post['username'] . "<span class='postID' style='display:none;'>" . $post['postID'] . "</span></th><th>" . $post['title'] . "</th><th colspan='2'>" . $post['post'] . "</th></tr>";
		if(isset($replysNum)){
			for($i = 0; $i < $replysNum; $i++){
			echo "<tr><td>" . $replys[$i]['username'] . "<span class='repID' style='display:none;'>" . $replys[$i]['repID'] . "</span></a></td><td>" . $replys[$i]['reply'] . "</td>";
				if($replys[$i]['active'] != "no"){
					echo "<td><div class='likeDiv'><span class='glyphicon glyphicon-thumbs-up like'></span></div><div class='likeDiv score'>" . $replys[$i]['likeScore'] . "</div><div class='likeDiv'><span class='glyphicon glyphicon-thumbs-down dislike'></span></div></td></tr>";
				}
				else {
					if($replys[$i]['likeType'] == "like") {
					echo "<td><div class='likeDiv'><span class='glyphicon glyphicon-thumbs-up liked'></span></div><div class='likeDiv score'>" . $replys[$i]['likeScore'] . "</div><div class='likeDiv'><span class='glyphicon glyphicon-thumbs-down disabledLike'></span></div></td></tr>";
					}
					else {
						echo "<td><div class='likeDiv'><span class='glyphicon glyphicon-thumbs-up disabledLike'></span></div><div class='likeDiv score'>" . $replys[$i]['likeScore'] . "</div><div class='likeDiv'><span class='glyphicon glyphicon-thumbs-down disliked'></span></div></td></tr>";
					}
				}
			}
		}
		echo "<tr><td colspan='3'><button class='replySecButton'>Make a reply</button>";
		echo "<div class='postSection'><textarea></textarea><button class='replyButton'>OK</button></div>";
		echo "</td></tr>";
		echo "</table>";
	?>
		</div>
	</body>
<script>
var clickedLike, likeType, loggedUserID = document.getElementById("loggedUserID").innerHTML;
function checkLike(){
	
}
$(document).on("click", ".like", function(){
	$(this).removeClass('like').addClass("liked").closest('td').find('.dislike').removeClass('dislike').addClass('disabledLike');
	clickedLike = $(this);
	scoreDiv = clickedLike.closest('tr').find('.score');
	score = $(scoreDiv).text();
	scoreDiv.text(++score);
	likeType = "like";
	updateLike();
});
$(document).on("click", ".dislike", function(){
	$(this).removeClass('dislike').addClass("disliked").closest('td').find('.like').removeClass('like').addClass('disabledLike');
	clickedLike = $(this);
	score = clickedLike.closest('tr').find('.score').text();
	clickedLike.closest('tr').find('.score').text(--score);
	likeType = "dislike";
	updateLike();
}); 

function updateLike() {
	var postID = clickedLike.closest("table").find(".postID").text();
	var repID = clickedLike.closest("tr").find(".repID").text();
	alert(postID + " " + repID + " " + loggedUserID);
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "replyLike.php?repID=" + repID + "&userID=" + loggedUserID + "&type=" + likeType, true);
	ajax.send();
}
$(document).on("click", ".replyButton", function(){
	var reply = $(this).closest('tr').find('textarea').val();
	var postID = $(this).closest('table').find('.postID').text();
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4 && ajax.status == 200){
		alert(ajax.responseText);
		}
	};
	ajax.open("GET", "makeReply.php?reply=" + reply + "&userID=" + loggedUserID + "&postID=" + postID, true);
	ajax.send();
});
</script>
</html>