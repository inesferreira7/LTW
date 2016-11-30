<?php
if(!isset($_POST["username"])) {
	header('Location: register.php');
    die();
}

    try{
      $db = new PDO('sqlite:../database/database.db');
    }
    catch(PDOException $ex){
      echo "false";
    }

  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $db->prepare('SELECT * FROM User');
  $stmt->execute();

  $result = $stmt->fetchAll();

  foreach($result as $row){
    if($row["username"] == $username && $password == $row["password"]){
      echo 'true';
      header('Location: principalUser.php');
      return;
    }
  }
  echo 'false';
  header('Location: principal.php');
?>
