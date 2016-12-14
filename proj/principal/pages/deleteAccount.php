<?php
include_once("connection.php");

global $db;

session_start();

$username = $_SESSION["username"];

$stmt = $db->prepare('DELETE FROM User where username =?');
$stmt->execute([$username]);

header('Location:logout.php');
