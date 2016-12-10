<?php
include_once "connection.php";

session_start();

global $db;

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

if(verify_password($password))

$stmt = $db->prepare('SELECT * FROM User');
$stmt->execute();

$result = $stmt->fetchAll();

foreach($result as $row){
  if($row["username"] == $username){
    if(!verify_password($password, $row['password'])){
      echo 'false';
      header('Location: principal.php');
    }
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
