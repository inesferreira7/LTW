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
    <title>Foodaholics-User</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/principalUser.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/dropDownUser.js"></script>
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
        <img id="currentPhoto" src="<?php echo $image?>" onerror="this.src='../res/images/defaultUser.png'" width="110" height="110" onclick="clickUser()" class="dropbtn">
        <div id="userOptions" class="dropdown-content">
            <a href="principalUser.php"><?php echo $username ?></a>
            <a href="editUser.php">Edit Profile</a>
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
            <a href="logout.php">Logout</a>
        </div>

    </div>


</div>
<div id="content">
    <form method="post" action="../pages/search.php">
      <input type="text" class="search" name="search" placeholder="Search">
      <button type="submit" class="button">
    </form>
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
</body>
</html>
