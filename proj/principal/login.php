<?php

$db = new PDO("sqlite:../database/database.db");

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

  $statement = $db->prepare('INSERT INTO User VALUES (NULL, ?, ?, ?, ?, ?)');
  $statement->execute([$email, $username, $password,$firstname,$lastname]);


header('Location: register.html');
?>
