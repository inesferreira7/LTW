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
      <div id="all">
      <div id="big">
        <?php
        foreach($rests as $rest){

          $name = $rest['name'];
          $description = $rest['descricao'];
          $address = $rest['morada'];
          $image = $rest['image'];
          echo "<div id='each'>";


          echo "<img id='imageR' src='" . $image . "' alt='Restaurant image' width='300' height='auto'>";

          echo"<div id='right'>";

          echo "<p class='name'>" . $name . "</p>";

          echo"<button id='editButton' type='button' onclick='openEdit()'>Edit Profile</button>
          <a href='deleteRest.php?name=". $name . "'>
              <input id='deleteRest' value='Delete restaurant'>
          </a>
          </div>
          <div id='righter'></div>";

          echo "</div>";
        }
         ?>

       </div>
  <div id="add">
    <button id='addButton' type='button' onclick='openAdd()'>Add restaurant</button>
 </div>
 </div>

  </body>
  </html>
