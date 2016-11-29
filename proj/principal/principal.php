<?php
/*
session_start();
if(isset($_SESSION["username"])) {
    header('Location: principal.php');
    die();
}*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Foodaholics</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="reset.css">
		<link rel="stylesheet" href="style.css">
	</head>
  <body>

    <div id="header">
			<div id="logo">
				<img src="fork.png" class="logo" alt="Foodaholics" width="128" height="128">
			</div>
			<div id="title">
				<img id="foodaholics" src="title.png" alt="Foodaholics" >
			</div>
        <form action="getUsers.php" method="post" id="right">
            	<input type="text" name="username" class="search1" placeholder="Enter Username" id='loginUsername'/>
            	<input type="password" name="password" class="search2" placeholder="Enter Password" id='loginPassword'/>
            	<input id='login' type="submit" value="Log In"/>
        </form>
			 <div id="bottom">
				<h1 id="new_user">Are you a new user? </h1>
				<a href="register.php" id="register">Register now!</a>
			 </div>
	</div>
	<div id="content">
		<form>
          <input type="text" class="search" placeholder="Search">
					<input type="button" class="button">
		</form>
	</div>

	<div class="image1">
		<div class="image">
			<img id="myImg" src="pizza.jpg"  width="300" height="200">
	</div>





  


	</body>
</html>
