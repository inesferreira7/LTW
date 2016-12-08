<?php
include_once('connection.php');

global $db;

$restname=$_POST['search'];

  $stmt = $db->prepare("SELECT * FROM Restaurant WHERE name='$restname'");
  $stmt->execute();
  $r = $stmt->fetch();
  echo $r["name"];
  echo $r["descricao"];
  echo $r["morada"];

?>
