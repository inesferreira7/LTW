<?php
include_once("connection.php");

global $db;

session_start();

$userid = $_SESSION['id'];

$name=$_POST['name'];
$description=$_POST['description'];
$address = $_POST['address'];
$image = $_FILES['image'];

$uploaddir = '../res/images/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile))
  echo "File is valid, and was successfully uploaded.\n";

$stmt = $db->prepare('SELECT * from Owner where user_id = ?');
$stmt->execute([$userid]);
$owner = $stmt->fetch();
$ownerid = $owner['owner_id'];

$s = $db->prepare('INSERT INTO Restaurant VALUES(NULL,?,?,?,?,?)');
$s->execute([$name, $description, $address, $ownerid,$uploadfile]);
?>
