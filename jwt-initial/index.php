<?php

require __DIR__ . "/autoload.php";

if(isset($_COOKIE['authorization'])){
    $payload=JWT::decode($_COOKIE['authorization']);
    if($payload===false){
        setcookie('authorization',null,-1);
        header("Location: login.html");
        die();
    }
    if($payload['exp']<time()){
        setcookie('authorization',null,-1);
        header("Location: login.html");
        die();
    }
    echo 'Welcome '.$payload['user'].'!';
}else{
    header("Location: login.html");
}
