<?php

$host='localhost';
$username='root';
$password='';
$db='first database';

try{
    $pdo= new PDO("mysql:host=$host;dbname=$db",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM users ";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    echo '<pre>';
    var_dump($stmt);
    var_dump(empty($stmt->fetchAll(PDO::FETCH_ASSOC)));

    $stmt->execute();
    var_dump($stmt->fetchAll());

    echo '<br>successful!';
}catch(PDOException $e){
    echo 'error<br>'.$e->getMessage();
}
