<?php

$db = new PDO("sqlite:../database/database.db");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

  $statement = $db->prepare('INSERT INTO User VALUES (NULL, ?, ?, ?, ?, ?)');
  $statement->execute([$firstname, $lastname, $email,$username,$password]);

  //$username = mysql_real_escape_string($username);

  $stmt = $db->prepare('SELECT * FROM User WHERE username= ?');
  $stmt->execute([$username]);
  $result = $stmt->fetch();
  $id = $result["user_id"];

  $s = $db->prepare("INSERT INTO Reviewer(reviewer_id, user_id) VALUES (NULL, $id)");
  $s->execute();
  header('Location: principal.php');


?>
