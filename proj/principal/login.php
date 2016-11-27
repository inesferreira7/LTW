<?php
include_once('user.php');

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POSTO['lastname'];

if(createUser($username, $password, $email, $name, $dateOfBirth, $gender, $picture) == 0)
        echo 'User successfully created! You may now log in.';
