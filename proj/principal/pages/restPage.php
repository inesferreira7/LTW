<?php
  include_once("connection.php");

  global $db;

  session_start();

  $name = $_GET["name"];

  $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name = ?');
  $stmt->execute([$name]);

  $res = $stmt->fetch();

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
    <div id="information">
      <?php
      $r_name = $res['name'];
      $image = $res['image'];
      $description=$res['descricao'];
      $address = $res['morada'];
      echo "<div class='restname'>
              <p>" . $r_name . "</p></div>";

      echo "<div class='inf'>
              <img src='" . $image . "'alt='Image'><br>
              <p>" . $description . "</p>
              <p>" . $address . "</p>";
      ?>
    </div>
    <div header ="review">
      <form id="addreview" method="post" action="addReview.php">
        <input type="number" name="stars" min="1" max="5" value="1">
        <textarea name="review" rows="4" cols="50"></textarea>
        <button type="submit">Add review</button>
      </form>
    </div>
  </body>
</html>
