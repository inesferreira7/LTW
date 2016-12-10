<?php
  include_once("connection.php");

  global $db;

  session_start();

  $name = htmlspecialchars($_POST['name']);
  $description = htmlspecialchars($_POST['description']);
  $address = htmlspecialchars($_POST['address']);

  if(strlen($name) != 0){
    $changeName = $db->prepare('UPDATE Restaurant SET name= ?');
    $changeName->execute([$name]);
    echo 'Name changed successfully';
  }

  if(strlen($description) != 0){
    $changeDesc = $db->prepare('UPDATE Restaurant SET descricao= ?');
    $changeDesc->execute([$description]);
    echo 'Description changed successfully';
  }

  if(strlen($address) != 0){
    $changeAddress= $db->prepare('UPDATE Restaurant SET morada= ?');
    $changeAddress->execute([$address]);
    echo 'Address changed successfully';
  }
