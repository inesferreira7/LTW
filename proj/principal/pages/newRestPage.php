<?php
  include_once("connection.php");

  global $db;

  session_start();

  $_SESSION['token'] = generateRandomToken();

  $name = $_GET["name"];

  $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name = ?');
  $stmt->execute([$name]);

  $res = $stmt->fetch();

  $getOwner = $db->prepare('SELECT * FROM Owner WHERE user_id = ?');
  $getOwner->execute([$_SESSION['id']]);

  $ret = $getOwner->fetch();

  $owner = $ret['user_id'];

  $s = $db->prepare('SELECT * FROM Review where restaurant_id = ?');
  $s->execute([$res['restaurant_id']]);
  $reviews = $s->fetchAll();

  $_SESSION['rest'] = $res['restaurant_id'];

  $photo="";

  if(isset($_SESSION['id'])){
    $getPhoto = $db->prepare('SELECT * FROM User WHERE user_id=?');
    $getPhoto->execute([$_SESSION['id']]);

    $res1 = $getPhoto->fetch();

    $photo = $res1['image'];
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Foodaholics</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/newRestPage.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <script type="text/javascript" src="../js/main.js"></script>

</head>
<body>




<div id="mainDiv">
  <div id="user_photo">
  <?php
    if(isset($_SESSION['id']))
      echo '<a href="newPrincipal.php">
      <img id="user_photo" src ="' . $photo . '" onerror="this.src=\'../res/images/defaultUser.png\'" width="200" height="auto"></a>';
  ?>
</div>
  <div id="reviews">
   <?php
    $r_name = $res['name'];
    $image = $res['image'];
    $description=$res['descricao'];
    $address = $res['morada'];


    echo "<p class='title'>Reviews: </p>";

   foreach($reviews as $review){
      $comment=$review['comment'];
      $stars = $review['stars'];
      $s = $db->prepare('SELECT * from User where user_id = ?');
      $s->execute([$review['user_id']]);
      $user=$s->fetch();


      echo "<p class='whoCommented'>" . $user['username'] . " wrote: </p>";
      echo "<p class='comment' class='com'>&nbsp;" . $comment . "    &nbsp;   "." rating: " . $stars ."</p> <br>" ;

      $rep = $db->prepare('SELECT * FROM Reply WHERE review_id = ?');
      $rep->execute([$review['review_id']]);

      $replies = $rep->fetchAll();
      foreach($replies as $r){
        $getrep = $db->prepare('SELECT * FROM User WHERE user_id = ?');
        $getrep->execute([$r['user_id']]);
        $repUser = $getrep->fetch();

        echo "<p class='whoReplied'>&nbsp;" . $repUser['username'] . " replied: </p>";
        echo "<p class='replyText'>&nbsp;" . $r['comment'] . "</p>" ;
      }

      if(isset($_SESSION['id']))
      echo "<form method='post' class='reply' action='addReply.php?name=" . $review['review_id'] . "&restname=" . $name ."'>
        <input type='hidden' name='token' value='" . $_SESSION['token'] . "'/>
        <textarea name='" . $review['review_id'] . "' rows='4' cols='50' required></textarea><br>
        <button type='submit'>Reply</button>
      </form>";

    }

    if(isset($_SESSION['id']) && $_SESSION['id'] !== $owner)
      echo "<form id=\"addreview\" method=\"post\" action='addReview.php?name=".'&restname=' . $name ."'>
              <label id='rating'>Rating: </label>
              <input type='number' name='revVal' id='stars' min='1' max='5' value='1'>
              <button id='submitReview' type='submit'>Add review</button><br>
              <textarea name='revText' id='reviewText' rows='4' cols='50' required ></textarea>
              <input type='hidden' name='token' value='" . $_SESSION['token'] . "'/>
            </form>";
    ?>
</div>

  <div class="restaurantImage">
    <img id='restaurantImage' src='<?php echo  $image ?> 'alt='Image' width='290' height='200'>
  </div>


  <div id='restaurantInfo'>
    <p id="name" ><?php echo $r_name ?></p>
    <p id="description"><?php echo $description ?></p>
    <p id="address"><?php echo $address ?></p>
    <iframe width='270' height='168' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=" <?php echo $address ?> "&amp;output=embed'></iframe>


  </div>
  


</div>

</body>
</html>
