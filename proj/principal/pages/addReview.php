<?php
  include_once("connection.php");

  global $db;

  session_start();

  if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    header('Location: 403.html');
    die();
}

  $resname = $_GET['restname'];

  if(!isset($_SESSION['username'])){
    echo 'Cant post a comment if u are not a user...';
    return;
  }

  echo $_SESSION['username'];

  echo $resname;

  $rest_id = $_SESSION['rest'];

  $user_id = $_SESSION['id'];

  $stars=$_POST['revVal'];
  $review=$_POST['revText'];


  $stmt = $db->prepare('INSERT INTO Review VALUES(NULL,?,?,?,?)');
  $stmt->execute([$user_id,$rest_id,$review,$stars]);

  header('Location: newRestPage.php?name=' . $resname);

?>
