<?php
include_once('connection.php');

global $db;

session_start();

if(!isset($_SESSION['search'])){
  echo "search is empty1";
  //header('Location: principal.php');
  return;
}
else {
  $search = $_SESSION['search'];
}

if(count($search) === 0){
  echo "search is empty2";
  //header('Location: principal.php');
  return;
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

unset($_SESSION['search']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-Search</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/displayRestaurants.css">
    <script type="text/javascript" src="../js/dropDownUser.js"></script>
</head>

<body>

<div id="header">
    <div id="logo">
        <a href="principal.php" width="128" >
            <img src="../res/images/logo.png" class="logo" alt="Foodaholics" width="500" height="80">
        </a>
    </div>

    <div id="userImage" class="dropdown">
        <img id="currentPhoto" src="<?php echo $image?>"onerror="this.src='../res/images/defaultUser.png'" width="110" height="110" onclick="clickUser()" class="dropbtn">
        <div id="userOptions" class="dropdown-content">
            <a href="../userPage.html"><?php echo $username?></a>
            <a href="editUser.php">Edit Profile</a>
            <a href="principal.php">Logout</a>
        </div>
    </div>

</div>
  <?php
  foreach($search as $res){


    $name = $res["name"];
    $descricao = $res["descricao"];
    $morada = $res["morada"];

    echo "<div class='rest'>
                        <a href='restPage.php?name=". $name . "'>" . $name ."</a>
                        <h5 id='morada' ><iframe width='200' height='128' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=" . $morada . "&amp;output=embed'></iframe>" . $morada . "</h5><h3 id='descricao'>" . $descricao ."</div>";

    $image = $res["image"];
    echo "<div class='restI'>
            <img id='img' src='". $image . "' alt='Image restaurant' ><br></div>";

  }
  ?>
</body>
</html>
