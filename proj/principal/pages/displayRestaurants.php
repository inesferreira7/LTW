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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics-Search</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/displayRestaurants.css">

</head>

<body>






  <?php
  foreach($search as $res){
    $name = $res["name"];
    $descricao = $res["descricao"];
    $morada = $res["morada"];
    $image = $res["image"];

    echo "<div class='currentRestaurant'> 
                <a href='newRestPage.php?name=".$name."'<img id='img' src=" .$image. " alt='Image restaurant' ></a>
                    <div id='nameDiv'>
                        <label id='name'>Name:</label>
                        <label id='realName'>" . $name ."</label>
                    </div>
                    
                    <div id='addressDiv'>
                        <label id='address'>Address:</label>
                        <label id='realAddress'>" . $morada ." </label>
                    </div>
                 
                    <div id='descriptionDiv'>
                        <label id='description'>Description:</label>
                        <label id='realDescription'>" .$descricao ."</label>
                    </div>
            
          </div>";


    /*<iframe width='200' height='128' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=\" . $morada . \"&amp;output=embed'></iframe>*/


  }
  ?>
</body>
</html>
