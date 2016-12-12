<?php
include_once ("connection.php");

global $db;

session_start();

if(!isset($_SESSION['username'])){
    header("principal.php");
}

$username = $_SESSION['username'];

$table = $db->prepare('SELECT * FROM User');
$table->execute();
$result = $table->fetchAll();

foreach($result as $row) {
    if ($row["username"] === $username) {
        $image = $row["image"];
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/newPrincipal.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script type="text/javascript" src="../js/dropDownUser.js"></script>



</head>
<body>

<div id="container">

    <div id="logo" >
        <img src="../res/images/logo.png" class="logo" alt="Foodaholics" width="370" >
    </div>


    <div id="searchContainer">
        <form class= "search" method="post" action="../pages/search.php">
            <input type="text" id="searchBar" placeholder="Search">
            <button type="submit" id="searchButton">
        </form>
    </div>
    
    <div id="userImage" class="dropdown">
        <img id="currentPhoto" src="<?php echo $image?>" onerror="this.src='../res/images/defaultUser.png'" width="110" height="110" onclick="clickUser()" class="dropbtn">
        <div id="userOptions" class="dropdown-content">
            <a href="#">Profile</a>
            <a href="#">Edit Profile</a>
            <?php
            $userid = $_SESSION['id'];
            $s = $db->prepare('SELECT * FROM Owner');
            $s->execute();
            $owners = $s->fetchAll();
            foreach($owners as $owner){
                if($owner['user_id'] === $userid){
                    echo "<a href='manageRest.php'>Manage restaurants</a>";
                }
            }
            ?>
            <a href="main.php">Logout</a>
        </div>

    </div>


</body>
</html>