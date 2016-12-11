<?php

include_once("connection.php");

global $db;

session_start();

if(isset($_SESSION['id'])){
    header('Location: principalUser.php');
    die();
    return;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script type="text/javascript" src="../js/main.js"></script>


</head>
<body>


<div class="parallax"></div>

<div id="container">
    <div id="logo" >
        <img src="../res/images/logo.png" class="logo" alt="Foodaholics" width="312" >
    </div>
    <div id="buttons">
            <button id="login" onclick="document.getElementById('formContainer').style.display='block'">Login</button>
            <input id='register' type="submit" value="Register" />
    </div>

<div id="formContainer" class="modal">

    <form class="modal-content animate" method="post" action="getUsers.php">

        <div class="formPU">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <input id="loginPU" type="submit" value="Log In"> </input>

            <button id="cancelPU" type="button" onclick="document.getElementById('formContainer').style.display='none'" >Cancel</button>

            <?php
              if(isset($_SESSION['login-error'])){
                echo "<script> document.getElementById('formContainer').style.display='block' </script>";
                echo "<p id='login-error'>" . $_SESSION['login-error'] . "</p>";
                unset($_SESSION['login-error']);
              }

            ?>

        </div>

    </div>
    <div class="best_res">
    <?php
      $stmt = $db->prepare('SELECT restaurant_id FROM Review GROUP BY restaurant_id ORDER BY AVG(stars) DESC');
      $stmt->execute();
      $res = $stmt->fetchAll();
      $number_of_rows = $stmt->fetchColumn();
      $count = 1;
      foreach($res as $row){
        if($count === 6 || $count === $number_of_rows){
          break;
        }
        $count++;
        $temp = $db->prepare('SELECT * FROM Restaurant WHERE restaurant_id = ? ');
        $temp->execute([$row["restaurant_id"]]);
        $restemp = $temp->fetch();
        echo "<a href='restPage.php?name=" . $restemp["name"] . "' class='image' >
                  <img src='" . $restemp["image"] . "' alt='restaurant photo' width='170' height='128'></a>";
      }
    ?>
    </div>
  </div>
    </form>
</div>

<div class="parallax"></div>
</body>
</html>