<?php
include_once("connection.php");

global $db;

session_start();

$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$restname = htmlspecialchars($_POST['r_name']);
$description = htmlspecialchars($_POST['description']);
$address = htmlspecialchars($_POST['address']);


$password = password_hash($password, PASSWORD_DEFAULT);




if(strlen($username) < 3){
  echo "Username needs to be at least 3 characters long";
}
else if(strlen($password) < 7){
  echo "Password needs to be at least 7 character long";
}
else{

  $uploads_dir = '../res/images/';
  foreach ($_FILES["files"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["files"]["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["files"]["name"][$key]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}

  $uploadfileO = $uploads_dir . basename($_FILES["files"]["name"][0]);
  $uploadfileR = $uploads_dir . basename($_FILES["files"]["name"][1]);

  $checkuser = $db->prepare('SELECT * FROM User WHERE username = ?');
  $checkuser->execute([$username]);

  if($checkuser->fetch()){
    echo "This username already exists";
    return;
  }

  $checkmail = $db->prepare('SELECT * FROM User WHERE email = ?');
  $checkmail->execute([$email]);

  if($checkmail->fetch()){
    echo "This email already exists";
    return;
  }


  $statement = $db->prepare('INSERT INTO User VALUES (NULL, ?, ?, ?, ?, ?, ?)');
  $statement->execute([$firstname, $lastname, $email,$username,$password,$uploadfileO]);

  //$username = mysql_real_escape_string($username);

  $stmt = $db->prepare("SELECT * FROM User WHERE username='$username'");
  $stmt->execute();
  $result = $stmt->fetch();
  $id = $result["user_id"];

  $s = $db->prepare("INSERT INTO Owner(owner_id, user_id) VALUES (NULL, $id)");
  $s->execute();

  $owner = $db->prepare("SELECT * FROM Owner WHERE user_id ='$id'");
  $owner->execute();
  $r = $owner->fetch();
  $ownerid = $r["owner_id"];

  $rest = $db->prepare('INSERT INTO Restaurant VALUES (NULL,?,?,?,?,?)');
  $rest->execute([$restname,$description,$address,$ownerid,$uploadfileR]);

  $_SESSION['id'] = $id;
  $_SESSION['username'] = $username;

  header('Location: newPrincipal.php');
}

?>
