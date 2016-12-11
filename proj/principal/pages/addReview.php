<?php
  include_once("connection.php");

  global $db;

  session_start();

  $resname = $_GET['name'];

  if(!isset($_SESSION['username'])){
    echo 'Cant post a comment if u are not a user...';
    return;
  }

  echo $_SESSION['username'];

  $rest_id = $_SESSION['rest'];

  $user_id = $_SESSION['id'];

  $stars=$_POST['stars'];
  $review=$_POST['review'];

  $stmt = $db->prepare('INSERT INTO Review VALUES(NULL,?,?,?,?)');
  $stmt->execute([$user_id,$rest_id,$review,$stars]);

  header('Location: restPage.php?name=' . $resname);

?>
