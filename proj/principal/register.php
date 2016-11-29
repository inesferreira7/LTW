<?php
if (isset($_GET['Message'])) {
    print $_GET['Message'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register-Foodaholics</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="reset.css">
		<link rel="stylesheet" href="register.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
  <body>
    <div id="header">
			<div id="logo">
				<a href="principal.php" width="128" >
				<img src="fork.png" class="logo" alt="Foodaholics" width="128" height="128">
                    </a>
			</div>
			<div id="title">
				<img id="foodaholics" src="title.png" alt="Foodaholics" >
			</div>
		</div>
		<div id="chose">
			<input type="radio" name ="type" value="user"> Reviewer
			<input type="radio" name ="type" value="owner"> Owner
		</div>
	</body>
</html>
