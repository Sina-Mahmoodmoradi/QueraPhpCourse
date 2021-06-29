<?php

function getExtension($str){
    if(strpos($str,'.')===false)return '';
    $arr=explode('.',$str);
    return $arr[count($arr)-1];
}

echo getExtension('slfjdi.na.txt');