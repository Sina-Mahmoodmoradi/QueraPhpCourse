<?php

$file_name=$_GET['path'];

$file=explode(PHP_EOL,file_get_contents($file_name));
$date=strtotime($file[0]);
array_shift($file);
$json=[];
foreach($file as $line){
    $exploded=explode(':',$line);
    //$exploded[1]=trim($exploded[1]);
    switch($exploded[1]){
        case 'today'     : $json[] = ['user'=>$exploded[0],'time'=>date('Y-m-d',$date)]                 ; break;
        case 'yesterday' : $json[] = ['user'=>$exploded[0],'time'=>date('Y-m-d',$date-24*3600)]; break;
        case 'tomorrow'  : $json[] = ['user'=>$exploded[0],'time'=>date('Y-m-d',$date+24*3600)]; break;
    }
}
echo '<pre>';
print_r($json);
file_put_contents('INFO.json',json_encode($json));