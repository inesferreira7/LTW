<?php
  include_once("connection.php");

  global $db;

  session_start();

  if(!isset($_SESSION['username']))
    header("principal.php");

  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $username = htmlspecialchars($_POST['username']);
  $image = htmlspecialchars($_POST['userfile']);
  $password = htmlspecialchars($_POST['newPassword']);
  $currPassword = htmlspecialchars($_POST['currPassword']);

  $password = password_hash($password, PASSWORD_DEFAULT);

  if(strlen($currPassword) != 0) {
    $stmt = $db->prepare('SELECT * FROM User');
    $stmt->execute();

    $result = $stmt->fetchAll();

    foreach ($result as $row) {
      if ($row["username"] == $username) {
        if (!password_verify($currPassword, $row['password'])) {
          echo 'false';
          header('Location: register.php');
          return;
        } else {
          echo 'true';
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $row["user_id"];
          die();
          return;

        }
      }
    }
  }

  if(strlen($password) != 0){
    $changePassword = $db->prepare('UPDATE User SET password= ? WHERE user_id= ?  ');
    $changePassword->execute([$password , $_SESSION['id']]);
    echo 'Password changed successfully';
  }



if(strlen($firstname) != 0){
    $changeFirst = $db->prepare('UPDATE User SET first_name= ? WHERE user_id = ?');
    $changeFirst->execute([$firstname, $_SESSION['id']]);
    echo 'First name changed successfully';
  }

  if(strlen($lastname) != 0){
    $changeLast = $db->prepare('UPDATE User SET lastname= ? WHERE user_id = ?');
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
      $changeEmail->execute([$email, $_SESSION['id']]);
    }
    echo 'Email changed successfully';
  }

  if(strlen($username) != 0){
    $checkUser = $db->prepare('SELECT * FROM User');
    $checkUser->execute();
    $res1 = $checkUser->fetchAll();
    $temp1 = 0;
    foreach($res1 as $row1){
      if($row1["username"] == $username)
        $temp1 = 1;
    }

    if($temp1 == 0){
      $changeUser = $db->prepare('UPDATE User SET username = ? WHERE user_id = ?');
      $changeUser->execute([$username, $_SESSION['id']]);
      $_SESSION['username'] = $username;
    }
    echo 'Username changed successfully';
  }



    $uploaddir = '../res/images/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);



    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
        $changeImage = $db->prepare('UPDATE User SET image = ? WHERE user_id = ?');
        $changeImage->execute([$uploadfile, $_SESSION['id']]);

    } else {
        echo "Upload failed";
}

        echo 'true';
        header('location: principalUser.php');
    return;
?>
