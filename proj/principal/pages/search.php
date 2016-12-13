<?php
include_once('connection.php');

global $db;

session_start();

unset($_SESSION['search']);

$restname=$_POST['search'];

  //seleciona restaurants
  $statement = $db->prepare('SELECT * FROM Restaurant');
  $statement->execute();
  $all = $statement->fetchAll();
  $rests = array();
  foreach ($all as $rest) {
    if(strpos($rest["name"], $restname) !== false){
      array_push($rests, $rest);
    }
    else if(strpos(strtolower($rest["name"]), $restname) !== false){
      array_push($rests, $rest);
    }
  }

  if(count($rests) > 0)
    $_SESSION['search'] = $rests;

  header("Location: displayRestaurants.php");
?>
