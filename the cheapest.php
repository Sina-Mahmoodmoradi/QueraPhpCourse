<?php

$n=readline();
$ln=readline();

$items=array();

for($i=0;$i<$n;$i++){
    $items[$i][0]=readline();
}

for($i=0;$i<$n;$i++){
    $items[$i][1]=readline();
}

usort($items,function($a,$b){
   return $a[1]-$b[1];
});

for($i=0;$i<$ln;$i++){
    echo $items[$i][0].":".$items[$i][1]."\n";
}