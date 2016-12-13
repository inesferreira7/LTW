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

</head>
<body>

<div id="container">

    <div id="logo" >
        <img src="../res/images/logo.png" class="logo" alt="Foodaholics" width="370" >
    </div>


    <div id="searchContainer">
        <form  method="post" action="../pages/search.php">
            <input type="text" class="search" name="search" id="searchBar" placeholder="Search">
            <button type="submit" id="searchButton">
        </form>
    </div>

    <div id="userImage" class="dropdown">
        <img id="currentPhoto" src="<?php echo $image?>" onerror="this.src='../res/images/defaultUser.png'" width="200" height="auto" onclick="clickUser()" class="dropbtn">

        <form id="userP" action="newPrincipal.php" >
            <input id="userProfile" type="submit" value="Profile">
        </form>

        <form id="editU" action="editUser.php" >
            <input id="editUser" type="submit" value="Edit Profile">
        </form>

        <?php
        $userid = $_SESSION['id'];
        $s = $db->prepare('SELECT * FROM Owner');
        $s->execute();
        $owners = $s->fetchAll();
        foreach($owners as $owner){
          if($owner['user_id'] === $userid){
            echo "<form id='manage' action='manageRest.php' >
                <input id='manageRest' type='submit' value='Manage Restaurants'>
            </form>";
          }
        }
        ?>
        <form id="userOut" action="logout.php" >
            <input id="logout" type="submit" value="Log Out">
        </form>


    </div>


</body>
</html>
