<?php
include_once ("connection.php");

global $db;

session_start();

$userid = $_SESSION['id'];

$owner = $db->prepare('SELECT * from Owner where user_id = ?');
$owner->execute([$userid]);
$r = $owner->fetch();
$ownerid = $r['owner_id'];

$restaurants = $db->prepare('SELECT * FROM Restaurant WHERE owner_id = ?');
$restaurants->execute([$ownerid]);
$rests = $restaurants->fetchAll();

foreach($rests as $rest){
  $name = $rest['name'];
  $description = $rest['descricao'];
  $address = $rest['morada'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-User</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/manageRest.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/manageRest.js"></script>
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
    </div>

    <div id="userOptions">
        <p class="big">
            <h1 id = "name"><?php echo $name ?></h1>
            <h1 id = "description"><?php echo $description?></h1>
            <h1 id = "address"><?php echo $address?></h1>
        </p>
      </div>
      <div id="Edit">
        <button id="editButton" type="button" onclick="openEdit()" width>Edit Profile</button>
      </div>

  </body>
  </html>
