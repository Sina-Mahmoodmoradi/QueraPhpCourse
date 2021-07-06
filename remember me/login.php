<?php

session_start();

if(isset($_COOKIE['token'])){
    if(hash_equals('e184949d88ed06d35fc380598898cfc7fae8b32d400137fc5e37761a15f2a1b1',$_COOKIE['token'])){
        header('location: index.php');
        $_SESSION['user']='admin';
    }else{
        header('location: login.html');
    }
}else{
    if(isset($_SESSION['user'])){
        header('location: index.php');
    }else{
        if(empty($_POST['username']) && empty($_POST['password'])){
            header('location: login.html');
        }else{
            if($_POST['username']==='admin' && password_verify($_POST['password'],'$2y$10$iySI6h4XZgCHw3FxXYb97Oa/8qQOSQkD.U8XgXSDt9RW5Ph.8m6IS')){
                header('location: index.php');
                if(isset($_POST['remember'])){
                    setcookie('token',hash_hmac('sha256','admin','acslgjwhrtt#$%&@@FDHN0.648d6a523'),time()+7*24*3600,'/');
                }
                $_SESSION['user']='admin';
            }else{
                header('location: login.html');
            }
        }
    }
}