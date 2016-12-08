<?php
include_once ("connection.php");

global $db;

session_start();

if(!isset($_SESSION['username'])){
    header("principal.php");
}
$username = $_SESSION["username"];


$table = $db->prepare('SELECT * FROM User');
$table->execute();
$result = $table->fetchAll();


foreach($result as $row){
    if($row["username"] == $username){
        $email = $row["email"];
        $firstName = $row["first_name"];
        $lastName = $row["lastname"];

    }
}




/*
$userEmail = $db->prepare("SELECT email FROM User WHERE username = 'catotas' ");
$userEmail->execute();
$email = $userEmail->fetchAll();
*/


?>


<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-User</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/editUser.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/dropDownUser.js"></script>
    <script type="text/javascript" src="../js/editUser.js"></script>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

</head>



<body>

<div id="header">
    <div id="logo">
        <a href="principal.php" width="128" >
            <img src="../res/images/fork.png" class="logo" alt="Foodaholics" width="128" height="128">
        </a>
    </div>
    <div id="title">
        <img id="foodaholics" src="../res/images/title.png" alt="Foodaholics" >
    </div>
    <div id="userImage" class="dropdown">
        <img id="currentPhoto" src="#" onerror="this.src='../res/images/defaultUser.png'" width="110" height="110" onclick="clickUser()" class="dropbtn">
        <div id="userOptions" class="dropdown-content">
            <a href="../userPage.html">Profile</a>
            <a href="editUser.php">Edit Profile</a>
            <a href="principal.php">Logout</a>
        </div>
    </div>
</div>

<div id = "body">
    <svg id="rectangle"  width="440" height="200" >
        <rect  width="410" height="190" style="fill:#20B2AA;stroke-width:2;stroke:#3D3522">
            Sorry, your browser does not support inline SVG.
    </svg>
    <div id="userOptions">
        <p class="big">
            <h1 id = "email"><?php echo $email ?></h1>
            <h1 id = "username"><?php echo $username?></h1>
            <h1 id = "fistname"><?php echo $firstName ?></h1>
            <h1 id = "lastname"><?php echo $lastName ?></h1>
        </p>

    </div>
    <div id="options"  >
        <img id="bigImage1" src="#" onerror="this.src='../res/images/defaultUser.png'" width = "110" heigt="110">
        <button id="editButton" type="button" onclick="openEdit()" width>Edit Profile</button>
        <button id="changeButton" type="button" onclick="changePassword()">Change Password</button>
    </div>
</div>
</body>
</html>
