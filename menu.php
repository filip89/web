
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">WebSiteName</a>
    </div>
	 <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="active"><a href="homepage.php">Home</a></li>
<?php if($_SERVER['PHP_SELF'] == '/web/homepage.php'){ ?>
      <li><a href="#sectionsMenu">Menu</a></li>
      <li><a href="#secDescription">About</a></li>
	<?php if(!isset($_SESSION['login'])){ ?>
	  <li><a href="#registration">Registration</a></li>
<?php }} ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) {?>
      <li><a href="userInfo.php?userID=<?php echo $_SESSION['id']; ?>"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username']; ?><span id='loggedUserID' style='display:none;'><?php echo $_SESSION['id']; ?></span></a></li>
	  <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Log Out</a></li>
<?php
}
else {
?>
	<li><a href="homepage.php#registration"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
		<div class="dropdown-menu navbar-inverse" >
			<div style="width:200%px;padding:20px;color:white;height:50%px;">
				<form action="login.php" method="POST">
					<div class="form-group">
						<label class="control-label">Username: </label>
							<input class="form-control" name="username" required></input>
					</div>
					<div class="form-group">
						<label class="control-label">Password: </label>
							<input class="form-control" type="password" name="password" required></input>
					</div>
					<button class="btn btn-default" type="submit">Ok</button>
				</form>
			</div>
		</div>
	  </li>
<?php } ?>
     </ul>
  </div>
  </div>
</nav>
<div>
<script>
$(".dropdown-toggle").click(function(){
	$(".dropdown-menu").slideToggle("fast");
});
</script>