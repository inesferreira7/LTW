<?php
include_once("connection.php");
global $db;
session_start();
if(!isset($_SESSION['username'])){
    header("principal.php");
}

$_SESSION['token'] = generateRandomToken();

$username = $_SESSION["username"];
$table = $db->prepare('SELECT * FROM User');
$table->execute();
$result = $table->fetchAll();
foreach($result as $row){
    if($row["username"] === $username){
        $email = $row["email"];
        $firstName = $row["first_name"];
        $lastName = $row["lastname"];
        $image = $row["image"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/newEdit.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/newEdit.js"></script>
  </head>
  <body>
    <div id="all">
      <div id="left">
        <img id="currentPhoto" src="<?php echo $image?>" onerror="this.src='../res/images/defaultUser.png'" width="200" height="auto">
          <form id="profile" action="newPrincipal.php" >
              <input id="profile" type="submit" value="Back">
          </form>
          <form id="delete" action="deleteAccount.php" >
              <input id="delete" type="submit" value="Delete account">
          </form>

      </div>
      <div id="right">
        <form id="update" method="post" action="../pages/updateUser.php" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php echo $_SESSION["token"];?>"/>
        <label> <b>First name</b> <input type="text" placeholder=<?php echo $firstName ?> name="firstname" id="firstnameR"></label><br>
        <label> <b>Last name</b><input type="text" placeholder=<?php echo $lastName ?> name="lastname" id="lastnameR"></label><br>
        <label> <b>Email</b> <input type="e-mail" placeholder=<?php echo $email ?> name="email" id="emailR"></label><br>
        <label> <b>Username</b> <input type="text" placeholder=<?php echo $username ?> class ="preenche" name="username" id="usernameR"></label><br>
        <label> <b>Password</b> <input type="password" placeholder="Enter password" class ="preenche" name="password" id="passwordR"></label><br>
        <button type="submit" class="button">Update</button>
      </div>
      </div>
      <input id="newImage" type="file" onchange="readURL(this);" name="userfile" />
      <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    </form>



  </div>
  </body>
  </html>
