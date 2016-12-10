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

unset($_SESSION['search']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-Search</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
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
  <?php
  foreach($search as $res){
    $name = $res["name"];
    echo "<div class='rest'>
            <a href='restPage.php?name=". $name . "'>" . $name .
            "</a><br></div>";
    echo $res["descricao"];
    echo $res["morada"];
  }
  ?>
</body>
</html>
