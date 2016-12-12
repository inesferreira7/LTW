<?php

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<title>Register-Foodaholics</title>
 		<meta charset="UTF-8">
 		<link rel="stylesheet" href="../css/reset.css">
 		<link rel="stylesheet" href="../css/registerR.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/registerR.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  </head>
  <body>
        <form  method="post" action="signupR.php" enctype="multipart/form-data">
          <div id="all">
          <div id="space">
          <label> <b>First name</b> <input type="text" placeholder="Enter first name" name="firstname" id="firstnameR" required></label><br>
          <label> <b>Last name</b><input type="text" placeholder="Enter last name" name="lastname" id="lastnameR" required></label><br>
          <label> <b>Email</b> <input type="e-mail" placeholder="Enter email" name="email" id="emailR" required></label><br>
          <label> <b>Username</b> <input type="text" placeholder="Enter username" class ="preenche" name="username" id="usernameR" required></label><br>
          <label> <b>Password</b> <input type="password" placeholder="Enter password" class ="preenche" name="password" id="passwordR" required></label><br>
        </div>
        <div id="image">
          <img id="photo" class= "setPhoto" src="#" onerror="this.src='../res/images/defaultUser.png'"  /><br>
          <input type="file" onchange="readURL(this);" name="userfile" /><br>
          <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
          <button id="sub" type="submit" class="button"> Register </button>
          </div>
        </div>
      </form>
</body>
</html>
