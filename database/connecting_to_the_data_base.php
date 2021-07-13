<?php


$host='localhost';
$username='root';
$password='';
$db='first database';

try{
    $conn= new PDO("mysql:host=$host;dbname=$db",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo 'connected successfully!';
}catch(PDOException $ex){
    echo "connection failed".$ex->getMessage();
}
