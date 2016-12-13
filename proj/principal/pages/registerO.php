<?php

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<title>Register-Foodaholics</title>
 		<meta charset="UTF-8">
 		<link rel="stylesheet" href="../css/reset.css">
 		<link rel="stylesheet" href="../css/registerO.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/registerO.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  </head>
  <body>
        <div id="lol2"><p></p></div>
        <form  method="post" action="signupO.php" enctype="multipart/form-data">
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
          <input type="file" onchange="readURL(this);" name="OPS" /><br>
          <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
          <button id="next" type="button" class="nextClick">Next step >></button>
          </div>
        </div>
        <div id="all1">
          <div id="rest">
          <p> Register your first restaurant </p>
          <label> <b>Name of restaurant</b> <input type="text" placeholder="Enter name of restaurant" name="r_name" id="r_nameO" required></label><br>
          <label> <b>Description</b> <input type="text" placeholder="Enter description" name="description" id="descriptionO"></label><br>
          <label> <b>Address</b> <input type="text" placeholder="Enter address" name="address" id="addressO"></label><br>
          </div>
          <div id="imageR">
            <img id="photoR" class= "setPhoto" src="#" onerror="this.src='../res/images/defaultUser.png'"  /><br>
            <input type="file" onchange="readURL1(this);" name="RPS" /><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <button id="sub" type="submit" class="nextClick"> Register </button>
          </div>
          <div id="lol"><p>          </p></div>
        </div>
        </form>
  </body>
</html>
