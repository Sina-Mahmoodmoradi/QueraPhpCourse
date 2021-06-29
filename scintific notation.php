<?php

function scintificNotation($number){

    $n=(float)$number;
    $e=0;

    while($n >= 10 || $n <= -10){
        $n/=10;
        $e++;
    }

    while($n > -1 && $n < 1){
        $n*=10;
        $e--;
    }

    return $n.'e'.$e;
}

echo scintificNotation('0.000548');