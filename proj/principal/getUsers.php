<?php
  if(!isset($_POST["username"])) {
	   header('Location: register.html');
     die();
  }

  $db = new PDO('sqlite: ../database/database.db');
  echo "sadfghjk";
  $stmt = $db->prepare('SELECT * FROM User');
  $stmt->execute();
  $result = $stmt->fetchAll();

  $username = $_POST["username"];
  $password = $_POST["password"];

  foreach($result as $row){
    if($row["username"] == $username && $row["password"] == $password){
      echo 'true';
      return;
    }
  }

  echo 'false'

?>
