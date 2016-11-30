<?php

$db = new PDO("sqlite:../database/database.db");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

  $statement = $db->prepare('INSERT INTO User VALUES (NULL, ?, ?, ?, ?, ?)');
  $statement->execute([$email, $username, $password,$firstname,$lastname]);

  //$username = mysql_real_escape_string($username);
  $stmt = $db->prepare("SELECT * FROM User WHERE username='$username'");
  $stmt->execute();
  $result = $stmt->fetch();
  $id = $result["user_id"];

  $s = $db->prepare("INSERT INTO Reviewer(reviewer_id, user_id) VALUES (NULL, $id)");
  $s->execute();

header('Location: register.php');
?>
