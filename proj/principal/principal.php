<?php
session_start();
if(isset($_SESSION["username"])) {
    header('Location: principal.php');
    die();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Foodaholics</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="reset.css"/>
		<link rel="stylesheet" href="style.css"/>
	</head>
  <body>
    <div id="header">
			<div id="left">
				<img src="chef2.png" class="logo" alt="Foodaholics" width="133" height="70"/>
				<img src="title.png" alt="Foodaholics"/>
			</div>
			<form action="getUsers.php" method="post" id="right">
				<input type="text" name="username" class="search1" placeholder="Enter Username" id='loginUsername'/>
				<input type="password" name="password" class="search2" placeholder="Enter Password" id='loginPassword'/>
				<input id='login' type="submit" value="Log In"/>
			</form>
			<div id="bottom">
				<h1 id="new_user">Are you a new user? </h1>
				<a href="register.html" id="register">Register now!</a>
			</div>
		</div>
		<div id="content">
			<form>
          <input type="text" class="search" placeholder="Search"/>
					<button type="button" class="button"></button>
			</form>
		</div>
	</body>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</html>
