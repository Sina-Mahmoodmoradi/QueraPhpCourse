<?php

$file=fopen('input.txt','r');
$str=fgets($file);
if(empty($str)){
    echo '';
}else{
$str=strtolower($str);
$str=ucwords($str);
$str=str_replace(' ','',$str);
$str[0]=strtolower($str[0]);
echo $str;
}