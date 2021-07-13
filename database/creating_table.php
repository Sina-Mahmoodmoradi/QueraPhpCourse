<?php

$host='localhost';
$username='root';
$password='';
$db='first database';

try{
    $conn= new PDO("mysql:host=$host;dbname=$db",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql="CREATE TABLE books2(
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    author_name VARCHAR(255) NOT NULL,
    publisher_name VARCHAR(255) NOT NULL,
    demo TEXT(65535) NOT NULL
    )";


    $conn->exec($sql);
    echo 'table created successfully!';
}catch(PDOException $e){
    echo 'failed!'.$e->getMessage();
}
