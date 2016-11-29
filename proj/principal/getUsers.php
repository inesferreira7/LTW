<?php
include_once "connection.php";
global $db;


  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $db->prepare('SELECT * FROM User');
  $stmt->execute();

  $result = $stmt->fetchAll();

  foreach($result as $row){
    if($row["username"] == $username && $password == $row["password"]){
      echo 'true';
      header('Location: register.php');
      return;
    }
  }
  echo 'false';
  header('Location: principal.php');
?>
