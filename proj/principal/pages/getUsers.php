<?php
include_once "connection.php";

session_start();

global $db;

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

$stmt = $db->prepare('SELECT * FROM User');
$stmt->execute();

$result = $stmt->fetchAll();

foreach($result as $row){
  if($row["username"] == $username){
    if(!password_verify($password, $row['password'])){
      echo 'false';
      $_SESSION['login-error'] = "Wrong username or password";
      header('Location: main.php');
      return;
    }
    else{
    echo 'true';
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $row["user_id"];
    header('Location: principalUser.php');
    die();
    return;
  }
}
}
$_SESSION['login-error'] = "Wrong username or password";
header('Location: main.php');
?>
