<?php
include_once("connection.php");

global $db;

session_start();

if ($_SESSION['token'] !== $_POST['token']) {
  header('HTTP/1.0 403 Forbidden');
  header('Location: 403.html');
  die();
}

$rev_id = $_GET['name'];
$rest_name = $_GET['restname'];

$comment = $_POST[$rev_id];

$user = $_SESSION['id'];

$stmt = $db->prepare('INSERT INTO Reply VALUES(NULL,?,?,?)');
$stmt->execute([$rev_id, $user, $comment]);

header('Location: restPage.php?name=' . $rest_name);
return;

?>
