<?php
  include_once("connection.php");

  global $db;

  session_start();

  if(!isset($_SESSION['username']))
    header("principal.php");

  $firstname =$_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username'];

  if(strlen($firstname) != 0){
    $changeFirst = $db->prepare('UPDATE User SET first_name= ? WHERE user_id = ?');
    $changeFirst->execute([$firstname, $_SESSION['id']]);
    echo 'First name changed successfully';
  }

  if(strlen($lastname) != 0){
    $changeLast = $db->prepare('UPDATE User SET last_name= ? WHERE user_id = ?');
    $changeLast->execute([$lastname, $_SESSION['id']]);
    echo 'Last name changed successfully';
  }

  if(strlen($email) != 0){
    $checkEmail = $db->prepare('SELECT * FROM User');
    $checkEmail->execute();
    $res = $checkEmail->fetchAll();
    $temp = 0;
    foreach($res as $row){
      if($row["email"] == $email)
        $temp = 1;
    }

    if($temp == 0){
      $changeEmail = $db->prepare('UPDATE User SET email = ? WHERE user_id = ?');
      $changeEmail->execute([$_SESSION['id'], $email]);
    }
    echo 'Email changed successfully';
  }

  if(strlen($username) != 0){
    $checkUser = $db->prepare('SELECT * FROM User');
    $checkUser->execute();
    $res1 = $checkUser->fetchAll();
    $temp1 = 0;
    foreach($res1 as $row1){
      if($row["username"] == $username)
        $temp1 = 1;
    }

    if($temp1 == 0){
      $changeUser = $db->prepare('UPDATE User SET username = ? WHERE user_id = ?');
      $changeUser->execute([$_SESSION['id'], $username]);
      $_SESSION['username'] = $username;
    }
    echo 'Username changed successfully';
  }

$uploaddir = '../res/images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
  echo "Upload failed";
}

  echo 'true';
  header('location: principalUser.php');
  return;
?>
