<?php
include_once "connection.php";
session_start();
global $db;
$username = $_POST["username"];
$password = $_POST["password"];
$stmt = $db->prepare('SELECT * FROM User');
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
  if($row["username"] == $username && $password == $row["password"]){
    echo 'true';
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $row["user_id"];
    header('Location: principalUser.php');
    die();
    return;
  }
}
echo 'false';
header('Location: principal.php');
?>
