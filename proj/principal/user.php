<?php
include_once('connection.php');

function createUser($firstname, $lastname, $email, $utilizador, $password){
  global $db;

  $statement = $db->prepare('INSERT INTO User VALUES(NULL,?,?,?,?,?)');
  $statement = $db->execute([$firstname,$lastname,$email,$utilizador,$password]);

  /*$statement = $db->prepare('SELECT * FROM Users;');
  $statement->execute();
  return $statement->errorCode();*/
}

?>
