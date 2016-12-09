<?php
include_once('connection.php');

global $db;

session_start();

$restname=$_POST['search'];

  //seleciona restaurants
  $statement = $db->prepare('SELECT * FROM Restaurant');
  $statement->execute();
  $all = $statement->fetchAll();
  $rests = array();
  foreach ($all as $rest) {
    if(strpos($rest["name"], $restname) !== false){
      echo $rest["name"];
      array_push($rests, $rest["name"]);
    }
    else if(strpos(strtolower($rest["name"]), $restname) !== false){
      echo $rest["name"];
      array_push($rests, $rest["name"]);
    }
  }

  if(count($rests) > 0)
    $_SESSION['search'] = $rests;

  header("Location: displayRestaurants.php");
?>
