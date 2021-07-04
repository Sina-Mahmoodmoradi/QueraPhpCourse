<?php

if(!isset($_FILES['file'])){
    exit();
}
if(empty($_POST['keyword']) || !$_FILES['file']['size'] || $_FILES['file']['error']===4){
    exit();
}
/*if (empty($_POST['keyword']) || empty($_FILES['file']['tmp_name']) || empty($file = file_get_contents($_FILES['file']['tmp_name']))) {
    die;
}*/



$lines=[];
move_uploaded_file($_FILES['file']['tmp_name'],'uploaded.txt');
$key=$_POST['keyword'];
$file=explode("\n",file_get_contents('uploaded.txt'));
$counter=0;
foreach($file as $line){
    $counter++;
    if(strpos($line,$key)!==false){
        $lines[]=$counter;
    }
}
/*$Line=[];
$file=fopen('uploaded.txt','r');
while(!feof($file)){
    $Line[]=fgets($file);
}
$counter=0;
foreach($Line as $line){
    $counter++;
    if(strpos($line,$key)!==false){
        $lines[]=$counter;
    }
}
fclose($file);
*/
echo json_encode($lines);
