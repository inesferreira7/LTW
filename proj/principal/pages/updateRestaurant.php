<?php
  include_once("connection.php");

  global $db;

  session_start();

  $name = htmlspecialchars($_POST['name']);
  $description = htmlspecialchars($_POST['description']);
  $address = htmlspecialchars($_POST['address']);
  $image = htmlspecialchars($_POST['image']);

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

  $uploaddir = '../res/images/';
  $uploadfile = $uploaddir . basename($_FILES['image']['name']);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
      $changeImage = $db->prepare('UPDATE Restaurant SET image = ?');
      $changeImage->execute([$uploadfile]);

  } else {
      echo "Upload failed";
}

      echo 'true';
      header('location: principalUser.php');
  return;
