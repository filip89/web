<?php
session_start();
$_SESSION['lastPage'] = 'homepage.php';
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
		<!--main css-->
		<link rel="stylesheet" href="css/mainCss.css">
		<style>
		#regSucces {
		text-align: center;
		vertical-align: 50%;
		}
		</style>
	</head>
	<body>
	<?php require "menu.php" ?>
	<div class="jumbotron theme">
			<h1>Homepage</h1>
	</div>
	<div id="sectionsMenu" class="container themeWhite">
		<div class="row">
			<a href="newsPortal.php">
			<div class="col-sm-4 sectionLink hid">	
				<div class="info"><span class="glyphicon glyphicon-info-sign"></span></div>
				<span class="glyphicon glyphicon-list-alt"></span>				
				<h3>News-portal</h3>
				<i>Read the news...</i>				
			</div>
			</a>
			<a href="apps.php">
			<div class="col-sm-4 sectionLink hid">	
				<div class="info"><span class="glyphicon glyphicon-info-sign"></span></div>
				<span class="glyphicon glyphicon-phone"></span>				
				<h3>Apps</h3>
				<i>App the apps...</i>				
			</div>
			</a>
			<a href="games.php">
			<div class="col-sm-4 sectionLink hid">
				<div class="info"><span class="glyphicon glyphicon-info-sign"></span></div>
				<span class="glyphicon glyphicon-knight"></span>				
				<h3>Games</h3>
				<i>Game the games...</i>
			</div>
			</a>
		</div>
		<div class="row">
			<a href="forum.php">
			<div class="col-sm-4 sectionLink hid">
				<div class="info"><span class="glyphicon glyphicon-info-sign"></span></div>
				<span class="glyphicon glyphicon-education"></span>				
				<h3>Forum</h3>
				<i>Forum the forum...</i>
			</div>
			</a>
			<a href="chat.php">
			<div class="col-sm-4 sectionLink hid">
				<div class="info"><span class="glyphicon glyphicon-info-sign"></span></div>
				<span class="glyphicon glyphicon-comment"></span>				
				<h3>Chat</h3>
				<i>Chat the chat...</i>
			</div>
			</a>
			<a href="images.php">
			<div class="col-sm-4 sectionLink hid">
				<div class="info"><span class="glyphicon glyphicon-info-sign"></span></div>
				<span class="glyphicon glyphicon-camera"></span>				
				<h3>Images</h3>
				<i>Image the images...</i>
			</div>
			</a>
		</div>
	</div>
	<!--PROMIJENITI izgled rowa - po 3 u redu!!-->
	<div id="secDescription" class="container-fluid theme">
		<div class="row">
			<div class="col-sm-4"><img class="img-responsive img-rounded" src="http://cdn.playbuzz.com/cdn/997c9777-367e-4637-b276-a0cd7400c8a6/b0979598-c427-4f71-b235-51e4c733753d.jpg"></img></div>
			<div class="col-sm-8">
				<h1>Video game</h1>
				<p>A video game is an electronic game that involves human interaction with a user interface to generate visual
				feedback on a video device such as a TV screen or computer monitor. The word video in video game traditionally referred to a raster display device,
				but in the 2000s, it implies any type of display device that can produce two- or three-dimensional images.
				Video games are sometimes believed to be a form of art, but this designation is controversial.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-push-8"><img class="img-responsive img-rounded" src="http://www.protohack.org/wp-content/uploads/2015/11/phone-apps.jpg"></img></div>
			<div class="col-sm-8 col-md-pull-4">
				<h1>Apps</h1>
				<p>A mobile app is a computer program designed to run on mobile devices such as smartphones and tablet computers. 
				Most such devices are sold with several apps bundled as pre-installed software, such as a web browser, email client, calendar, mapping program, 
				and an app for buying music or other media or more apps. Some pre-installed apps can be removed by an ordinary uninstall process, 
				thus leaving more storage space for desired ones. 
				Where the software does not allow this, some devices can be rooted to eliminate the undesired apps.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"><img class="img-responsive img-rounded" src="http://cdn.playbuzz.com/cdn/997c9777-367e-4637-b276-a0cd7400c8a6/b0979598-c427-4f71-b235-51e4c733753d.jpg"></img></div>
			<div class="col-sm-8">
				<p>A video game is an electronic game that involves human interaction with a user interface to generate visual
				feedback on a video device such as a TV screen or computer monitor. The word video in video game traditionally referred to a raster display device,
				but in the 2000s, it implies any type of display device that can produce two- or three-dimensional images.
				Video games are sometimes believed to be a form of art, but this designation is controversial.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-push-8"><img class="img-responsive img-rounded" src="http://cdn.playbuzz.com/cdn/997c9777-367e-4637-b276-a0cd7400c8a6/b0979598-c427-4f71-b235-51e4c733753d.jpg"></img></div>
			<div class="col-sm-8 col-md-pull-4">
				<p>A video game is an electronic game that involves human interaction with a user interface to generate visual
				feedback on a video device such as a TV screen or computer monitor. The word video in video game traditionally referred to a raster display device,
				but in the 2000s, it implies any type of display device that can produce two- or three-dimensional images.
				Video games are sometimes believed to be a form of art, but this designation is controversial.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"><img class="img-responsive img-rounded" src="http://cdn.playbuzz.com/cdn/997c9777-367e-4637-b276-a0cd7400c8a6/b0979598-c427-4f71-b235-51e4c733753d.jpg"></img></div>
			<div class="col-sm-8">
				<p>A video game is an electronic game that involves human interaction with a user interface to generate visual
				feedback on a video device such as a TV screen or computer monitor. The word video in video game traditionally referred to a raster display device,
				but in the 2000s, it implies any type of display device that can produce two- or three-dimensional images.
				Video games are sometimes believed to be a form of art, but this designation is controversial.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-push-8"><img class="img-responsive img-rounded" src="http://cdn.playbuzz.com/cdn/997c9777-367e-4637-b276-a0cd7400c8a6/b0979598-c427-4f71-b235-51e4c733753d.jpg"></img></div>
			<div class="col-sm-8 col-md-pull-4">
				<p>A video game is an electronic game that involves human interaction with a user interface to generate visual
				feedback on a video device such as a TV screen or computer monitor. The word video in video game traditionally referred to a raster display device,
				but in the 2000s, it implies any type of display device that can produce two- or three-dimensional images.
				Video games are sometimes believed to be a form of art, but this designation is controversial.
				</p>
			</div>
		</div>
	</div>
<?php
if(!isset($_SESSION['login'])){
?>
	<div class="container-fluid themeWhite">
		<div class="row">
			<div class="col-sm-4 disclaimer">
			<h1>Disclaimer!</h1>
				<p>A video game is an electronic game that involves human interaction with a user interface to generate visual
				feedback on a video device such as a TV screen or computer monitor. The word video in video game traditionally referred to a raster display device,
				but in the 2000s, it implies any type of display device that can produce two- or three-dimensional images.
				Video games are sometimes believed to be a form of art, but this designation is controversial.
				</p>
			</div>
			<div class="col-sm-8 hid" id="registration">
				<h1>Register...</h1>
				<div class="form-horizontal">
					
					<div class="form-group">
						<label class="control-label col-sm-2">First name: </label>
						<div class="col-sm-10">
							<input class="form-control" name="firstName" required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Last name: </label>
						<div class="col-sm-10">
							<input class="form-control" name="lastName" required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Date of birth: </label>
						<div class="col-sm-10">
							<input class="form-control" name="birthDate" type="date" required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Country: </label>
						<div class="col-sm-10">
							<input class="form-control" name="country"required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Username: </label>
						<div class="col-sm-10">
							<input class="form-control" name="username" required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">e-mail: </label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Password: </label>
						<div class="col-sm-10">
							<input class="form-control" type="password" name="password" required></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2"></label>
						<div class="col-sm-10">
							<button class="btn btn-default" onclick="registrate()">Submit</input>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	<!-- Modal -->
  <div id="regFailModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registration failed</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
<script>
function registrate() {
  var xhttp = new XMLHttpRequest();
  var fName = $("#registration [name='firstName']").val();
  var lName = $("#registration [name='lastName']").val();
  var bDate = $("#registration [name='birthDate']").val();
  var country = $("#registration [name='country']").val();
  var username = $("#registration [name='username']").val();
  var email = $("#registration [name='email']").val();
  var password = $("#registration [name='password']").val();
    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
		var info = JSON.parse(xhttp.responseText);
		// if registration failed
		if(info.status == 0){
		$("#regFailModal").find("p").text(info.errorDetail);
			$("#regFailModal").modal().show();
		}
		//if registration succeded
		else {
			$("#registration").find('*').hide("slow");
			$("#registration").append("<div id='regSucces'><h3>Thank you " + info.name + "! An e-mail was sent to " + info.email + ". Please verify to complete the registration.</h3></div>");
			$("#regSucces").hide().show("slow");
			}
	}
  };
  xhttp.open("POST", "register.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("fName=" + fName + "&lName=" + lName + "&bDate=" + bDate + "&country=" + country + "&username=" + username + "&email=" + email + "&password=" + password);
}

</script>
</html>