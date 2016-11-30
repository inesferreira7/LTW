<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-User</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="editUser.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="dropDownUser.js"></script>
    <script type="text/javascript" src="editUser.js"></script>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

</head>
<body>

<div id="header">
    <div id="logo">
        <a href="principal.php" width="128" >
            <img src="fork.png" class="logo" alt="Foodaholics" width="128" height="128">
        </a>
    </div>
    <div id="title">
        <img id="foodaholics" src="title.png" alt="Foodaholics" >
    </div>
    <div id="userImage" class="dropdown">
        <img id="currentPhoto" src="image.jpg" onerror="this.src='defaultUser.png'" width="110" height="110" onclick="clickUser()" class="dropbtn">
        <div id="userOptions" class="dropdown-content">
            <a href="userPage.html">Profile</a>
            <a href="editUser.php">Edit Profile</a>
            <a href="principal.php">Logout</a>
        </div>
    </div>
</div>

<div id = "body">
    <div id="bigImage" >

        <img id="bigImage1" src="#" onerror="this.src='defaultUser.png'" width = "110" heigt="110">
    </div>
    <div id="options">
        <button id="editButton" type="button" onclick="openEdit()">Edit Profile</button>
        <button id="changeButton" type="button" onclick="changePassword()">Change Password</button>
    </div>

</div>






</body>
</html>