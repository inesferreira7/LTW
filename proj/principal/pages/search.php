<?php
include_once('connection.php');

global $db;

$restname=$_POST['search'];

  //seleciona restaurants
  $statement = $db->prepare('SELECT * FROM Restaurant');
  $statement->execute();
  $all = $statement->fetchAll();
  foreach ($all as $rest) {
    if(strpos($rest["name"], $restname) !== false){
      echo $rest["name"];
    }
    if(strpos(strtolower($rest["name"]), $restname) !== false){
      echo $rest["name"];
    }
  }


?>
