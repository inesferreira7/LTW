<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-User</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="principalUser.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="dropDownUser.js"></script>
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
<div id="content">
    <form>
        <input type="text" class="search" placeholder="Search">
        <input type="button" class="button">
    </form>
</div>
</body>
</html>
