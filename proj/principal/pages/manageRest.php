<?php
include_once ("connection.php");

global $db;

session_start();

$userid = $_SESSION['id'];

$owner = $db->prepare('SELECT * from Owner where user_id = ?');
$owner->execute([$userid]);
$r = $owner->fetch();
$ownerid = $r['owner_id'];

$restaurants = $db->prepare('SELECT * FROM Restaurant WHERE owner_id = ?');
$restaurants->execute([$ownerid]);
$rests = $restaurants->fetchAll();

foreach($rests as $rest){
  $name = $rest['name'];
  $description = $rest['descricao'];
  $address = $rest['morada'];
}

?>
