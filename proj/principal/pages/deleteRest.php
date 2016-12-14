<?php
include_once ("connection.php");

global $db;

session_start();

$userid = $_SESSION['id'];
$name = $_GET['name'];
echo $name;

$stmt = $db->prepare('DELETE FROM Restaurant where name = ?');
$stmt->execute([$name]);

header('Location: manageRest.php');

?>
