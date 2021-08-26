<?php

require __DIR__ . "/autoload.php";

if(isset($_COOKIE['authorization'])){
    if(JWT::decode($_COOKIE['authorization'])===false){
        setcookie('authorization',null,-1);
        header("Location: login.html");
        die();
    }
    header('location: ' .'index.php');
    die();
}

$host= 'localhost';
$username='root';
$password='5479';
$dbname='digikala';

$pdo= new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$user=$_POST['username'];

$sql = "SELECT password 
        FROM users 
        WHERE username = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user]);
$pass= $stmt->fetch();
if(empty($pass)){
    header('location: ' .'login.html');
    die();
}
if(!password_verify($_POST['password'],$pass['password'])){
    header('location: ' .'login.html');
    die();
}
$default_exp = Config::getInstance()->get("default_exp");
$extended_exp = Config::getInstance()->get("extended_exp");
$exp = isset($_POST['remember']) ? $extended_exp : $default_exp;
$JWT = JWT::encode(['user'=>$user, 'exp'=>$exp+time()]);
setcookie('authorization',$JWT,$exp+time());
header('location: ' .'index.php');


