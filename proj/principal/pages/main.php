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
</div>


<div id="formContainer" class="modal">

    <form class="modal-content animate" action="action_page.php">

        <div class="formPU">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <input id="loginPU" type="submit" value="Log In"> </input>

            <button id="cancelPU" type="button" onclick="document.getElementById('formContainer').style.display='none'" >Cancel</button>

        </div>

        </div>
    </form>
</div>

<div class="parallax"></div>


</body>
</html>