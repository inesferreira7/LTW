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


<div class="parallax"></div>

<div id="div1">
  <div id="user_photo">
  <?php
    if(isset($_SESSION['id']))
      echo '<a href="newPrincipal.php">
      <img id="user_photo" src ="' . $photo . '" onerror="this.src=\'../res/images/defaultUser.png\'" width="128" height="128"></a>';
  ?>
</div>
  <div id="information">
    <?php
    $r_name = $res['name'];
    $image = $res['image'];
    $description=$res['descricao'];
    $address = $res['morada'];
    echo "<p class='title'>" . $r_name . "</p>";

    echo "<img src='" . $image . "'alt='Image' width='350' height='250'><br><br><br><br>";

    echo "<p class='title'> Reviews: </p>";

    foreach($reviews as $review){
      $comment=$review['comment'];
      $stars = $review['stars'];
      $s = $db->prepare('SELECT * from User where user_id = ?');
      $s->execute([$review['user_id']]);
      $user=$s->fetch();

      echo "<br><p>___________________________________</p></br>";
      echo "<br><br><p class='comt'>" . $user['username'] . " wrote: </p><br>";
      echo "<p id='comment' class='com'>&nbsp;" . $comment . "    &nbsp;   " . $stars ."</p><br>" ;

      $rep = $db->prepare('SELECT * FROM Reply WHERE review_id = ?');
      $rep->execute([$review['review_id']]);

      $replies = $rep->fetchAll();
      foreach($replies as $r){
        $getrep = $db->prepare('SELECT * FROM User WHERE user_id = ?');
        $getrep->execute([$r['user_id']]);
        $repUser = $getrep->fetch();

        echo "<p class='rep'>&nbsp;" . $repUser['username'] . " replied: </p><br>";
        echo "<p class='rep2'>&nbsp;" . $r['comment'] . "</p><br>" ;
      }

      if(isset($_SESSION['id']))
      echo "<form method='post' class='reply' action='addReply.php?name=" . $review['review_id'] . "&restname=" . $name ."'>
        <input type='hidden' name='token' value='" . $_SESSION['token'] . "'/>
        <textarea name='" . $review['review_id'] . "' rows='2' cols='50'></textarea><br>
        <button type='submit'>Reply</button>
      </form>";

    }
     echo "<br><br>";
    if(isset($_SESSION['id']) && $_SESSION['id'] !== $owner)
      echo '<form id="addreview" method="post" action="addReview.php?name=<?php echo $name?>">
              <input type="hidden" name="token" value="' . $_SESSION["token"] . '"/>
              <input type="number" name="stars" min="1" max="5" value="1">
              <textarea name="review" rows="4" cols="50"></textarea><br>
              <button type="submit">Add review</button>
            </form>';
    ?>
</div>
  <div id='inf'>
    <?php
    echo "<p>" . $description . "</p><br>
    <p>" . $address . "</p><br>
    <iframe width='270' height='168' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=" . $address . "&amp;output=embed'></iframe>";
    ?>
  </div>
</div>
<div class="parallax"></div>
</body>
</html>
