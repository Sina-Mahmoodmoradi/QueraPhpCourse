<?php

session_start();

if(!isset($_SESSION['counter'])){
    $_SESSION['counter']=2;
    echo 'This is your 1st visit in this session.';
}elseif($_SESSION['counter']==2){
    echo "This is your 2nd visit in this session.";
    $_SESSION['counter']++;
}elseif($_SESSION['counter']==3){
    echo "This is your 3rd visit in this session.";
    $_SESSION['counter']++;
}else{
    echo "This is your ".$_SESSION['counter']."th visit in this session.";
    $_SESSION['counter']++;
}




/*if(!isset($_COOKIE['counter'])){
    setcookie('counter','2');
    exit('This is your 1st visit in this session.');
}else{
    $new_value=$_COOKIE['counter']+1;
    setcookie('counter',$new_value);
}

if($_COOKIE['counter']==2){
    echo "This is your 2nd visit in this session.";
}else{
    echo "This is your ".$_COOKIE['counter']."th visit in this session.";

}*/
