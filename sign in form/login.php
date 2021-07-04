<?php

/*
$pass='fc7d1bcf2447219eb208b96aa3d0a58c';
if(isset($_POST['password'])){
    $pass2=md5($_POST['password']);
}else{
    echo 'invalid login';
    exit();
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
}else{
    echo 'invalid login';
    exit();
}

if($email=='admin@example.org' && $pass==$pass2){
    echo "welcome admin";
}else if(!empty($_POST['password']) && !empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "invalid email format";
}else{
    echo "invalid login";
}
*/


if (!isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']) || empty($_POST['email']) ) {
    die('invalid login');
}

$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('invalid email format');
}

if ($email == 'admin@example.org' && md5($password) == 'fc7d1bcf2447219eb208b96aa3d0a58c') {
    die('welcome admin');
}

die('invalid login');

