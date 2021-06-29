<?php

function checkRegistrationRules($arr){
    $length=count($arr);
    $newArr=[];
    for($i=0;$i<$length;$i++){
        if($arr[$i][0]!=="quera" && $arr[$i][0]!=="admin" && strlen($arr[$i][0])>=4){
            if(strlen($arr[$i][1])>=6 && !ctype_digit($arr[$i][1]) ){
                $newArr[]=$arr[$i][0];
            }
        }
    }
    return $newArr;
}

$arr=checkRegistrationRules([
    ['username', 'password'],
    ['sadegh', 'He3@lsa'],
    ['admin', 'kLS45@l$']
]);
print_r($arr);