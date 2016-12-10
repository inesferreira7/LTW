<?php
include_once('connection.php');
session_start();
global $db;

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$image = $_POST['userfile'];

if(strlen($username) < 3){
  echo "Username needs to be at least 3 characters long";
}
else if(strlen($password) < 7){
  echo "Password needs to be at least 7 character long";
}
else{

  $uploaddir = '../res/images/';
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);



  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";


  } else {
    echo "Upload failed";
  }

  echo 'true';

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
  $statement->execute([$firstname, $lastname, $email,$username,$password,$uploadfile]);

  //$username = mysql_real_escape_string($username);

  $stmt = $db->prepare("SELECT * FROM User WHERE username='$username'");
  $stmt->execute();
  $result = $stmt->fetch();
  $id = $result["user_id"];

  $s = $db->prepare("INSERT INTO Reviewer(reviewer_id, user_id) VALUES (NULL, $id)");
  $s->execute();
  header('Location: principal.php');








}

?>
