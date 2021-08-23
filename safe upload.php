<?php

if(empty($_FILES['photo']))
    die("No photo!");

/*if($_FILES['photo']['type'] != 'image/jpeg' AND $_FILES['photo']['type'] != 'image/png')
    die("Invalid photo!");*/

$filename = $_FILES['photo']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$ext=strtolower($ext);
if($ext != 'jpg' AND $ext != 'jpeg' AND $ext != 'png')
    die("Invalid photo!");

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
finfo_close($finfo);
if($mime != 'image/jpeg' AND $mime != 'image/png')
    die("Invalid photo!");

if($_FILES['photo']['size'] > 500*1024)
    die('Photo is too big!');
echo 'Photo changed successfully!';