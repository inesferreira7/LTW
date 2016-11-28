<?php
include_once('connection.php');

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

function createUser($firstname, $lastname, $email, $utilizador, $password){
  global $db;

  $statement = $db->prepare('INSERT INTO User VALUES(NULL,?,?,?,?,?)');
  $statement = $db->execute([$firstname,$lastname,$email,$utilizador,$password]);

  /*$statement = $db->prepare('SELECT * FROM Users;');
  $statement->execute();
  return $statement->errorCode();*/
}

?>
