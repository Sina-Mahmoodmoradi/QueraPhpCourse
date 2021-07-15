<?php

$host='localhost';
$username='root';
$password='';
$db='first database';

try{
    $conn = new PDO("mysql:host=$host;dbname=$db",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO books2 VALUES (1,'Life','God','Muhammad','once upon a time...');";
    $conn->exec($sql);
    $last_id=$conn->lastInsertId();
    echo $last_id;
}catch(PDOException $e){
    echo 'could not connect: '.$e->getMessage();
}