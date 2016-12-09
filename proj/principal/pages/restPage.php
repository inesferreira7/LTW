<?php
  include_once("connection.php");

  global $db;

  session_start();

  $name = $_GET["name"];

  $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name = ?');
  $stmt->execute([$name]);

  $res = $stmt->fetch();

  echo $res['restaurant_id'];
  echo $res['name'];
  echo $res['descricao'];
  echo $res["morada"];

?>
