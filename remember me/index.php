<?php

session_start();

if(isset($_COOKIE['token'])){
    if(hash_equals('e184949d88ed06d35fc380598898cfc7fae8b32d400137fc5e37761a15f2a1b1',$_COOKIE['token'])){
        echo "Hello from Quera!";
    }else{
        header('location: login.html');
    }
}elseif(isset($_SESSION['user'])){
    echo "Hello from Quera!";
}else{
    header("Location: login.php");
}