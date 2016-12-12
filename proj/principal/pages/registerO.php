<?php

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<title>Register-Foodaholics</title>
 		<meta charset="UTF-8">
 		<link rel="stylesheet" href="../css/reset.css">
 		<link rel="stylesheet" href="../css/registerO.css">
  </head>
  <body>
    <div id="all">
      <div id="space">
        <form  method="post" action="signupO.php">
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
          <button id="next" type="submit" class="button"> Next step >> </button>
        </div>
        </form>
      </div>
      </span>
    </div>
  </body>
</html>
