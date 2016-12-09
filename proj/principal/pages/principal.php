<?php

session_start();

	if(isset($_SESSION['id'])){
		header('Location: principalUser.php');
		die();
		return;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Foodaholics</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/reset.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
	</head>
  <body>

    <div id="header">
			<div id="logo">
				<img src="../res/images/fork.png" class="logo" alt="Foodaholics" width="128" height="128">
			</div>
			<div id="title">
				<img id="foodaholics" src="../res/images/title.png" alt="Foodaholics" >
			</div>
			<div id="top">
					<form id="right" action="getUsers.php" method="post"  onsubmit="return checkLogin();">
					<input type="text" name="username" class="search1" placeholder="Enter Username" id='loginUsername'/>
					<input type="password" name="password" class="search2" placeholder="Enter Password" id='loginPassword'/>
					<input id='login' type="submit" value="Log In"/>
				</form>
			</div>

			 <div id="bottom">
				<h1 id="new_user">Are you a new user? </h1>
				<a href="register.php" id="register">Register now!</a>
			 </div>
	</div>
	<div id="content">
		<form method="post" action="../pages/search.php">
          <input type="text" class="search" name="search" placeholder="Search">
					<button type="submit" class="button">
		</form>
	</div>

	<div class="image1">
		<div class="image">
			<img id="myImg" src="../res/images/pizza.jpg" width="300" height="200">
	</div>



	</body>
</html>
