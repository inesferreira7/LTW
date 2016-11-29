<?php
include_once "connection.php";

global $db;

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

if(strlen($username) < 3){
  echo "<script type='text/javascript'>alert('Username needs to be at least 3 characters long.'); window.location = 'register.php'</script>";
}
else{

  $statement = $db->prepare('INSERT INTO User VALUES (NULL, ?, ?, ?, ?, ?)');
  $statement->execute([$email, $username, $password,$firstname,$lastname]);

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
