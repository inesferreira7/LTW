<?php
include_once('user.php');

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

if(createUser($firstname, $lastname, $email, $username, $password) == 0)
        echo 'User successfully created! You may now log in.';
