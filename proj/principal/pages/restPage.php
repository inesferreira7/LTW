<?php
  include_once("connection.php");

  global $db;

  session_start();

  $name = $_GET["name"];

  $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name = ?');
  $stmt->execute([$name]);

  $res = $stmt->fetch();

  $s = $db->prepare('SELECT * FROM Review where restaurant_id = ?');
  $s->execute([$res['restaurant_id']]);
  $reviews = $s->fetchAll();

  $_SESSION['rest'] = $res['restaurant_id'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Foodaholics</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/restPage.css">
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
    <div id="showreviews">
      <?php
      foreach($reviews as $review){
        $comment=$review['comment'];
        $stars = $review['stars'];
        $s = $db->prepare('SELECT * from User where user_id = ?');
        $s->execute([$review['user_id']]);
        $user=$s->fetch();

        echo "<p id='comment'>" . $comment ."</p><p id='stars'>" . $stars ."</p><p id='username'>" . $user['username'] . "</p>" ;

        $rep = $db->prepare('SELECT * FROM Reply WHERE review_id = ?');
        $rep->execute([$review['review_id']]);

        $replies = $rep->fetchAll();
        foreach($replies as $r){
          echo "<p class='reply'>" . $r['comment'] . "</p><p id='username'>" . $r['user_id'] . "</p><br><br>" ;
        }

        echo "<form method='post' class='reply' action='addReply.php?name=" . $review['review_id'] . "&restname=" . $name ."'>
          <textarea name='" . $review['review_id'] . "' rows='2' cols='50'></textarea><br>
          <button type='submit'>Reply</button>
        </form>";

      }
       ?>
    </div>
    <div header ="review">
      <form id="addreview" method="post" action="addReview.php">
        <input type="number" name="stars" min="1" max="5" value="1">
        <textarea name="review" rows="4" cols="50"></textarea><br>
        <button type="submit">Add review</button>
      </form>
    </div>
  </body>
</html>
