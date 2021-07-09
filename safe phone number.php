<?php

/*$output='';
while(1){
    $line=readline();
    if($line==='END') break;
    $pattern='/((^|\D)09[\d]{2})([\d]{3})([\d]{4}($|\D))/';
    $replace='\1***\3';
    $output.=preg_replace($pattern,$replace,$line)."\n";
}
echo $output;*/

$line=' kajfljl aksajfl 09093456789';

$pattern='/((^|\D)09[\d]{2})([\d]{3})([\d]{4}($|\D))/';
$replace='\1***\4';
echo preg_replace($pattern,$replace,$line)."\n";