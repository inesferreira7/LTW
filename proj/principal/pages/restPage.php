<?php
  include_once("connection.php");

  global $db;

  session_start();

  $name = $_GET["name"];

  $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name = ?');
  $stmt->execute([$name]);

  $res = $stmt->fetch();

  echo $res['restaurant_id'];
  echo $res['name'];
  echo $res['descricao'];
  echo $res["morada"];

  $_SESSION['rest'] = $res['restaurant_id'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Foodaholics</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/reset.css">
  </head>
  <body>
    <div header ="review">
      <form id="addreview" method="post" action="addReview.php">
        <input type="number" name="stars" min="1" max="5" value="1">
        <textarea name="review" rows="4" cols="50"></textarea>
        <button type="submit">Add review</button>
      </form>
    </div>
  </body>
</html>
