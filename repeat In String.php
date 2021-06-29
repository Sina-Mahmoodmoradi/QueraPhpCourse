<?php

function repeatInString($string,$find){
    $a=$string;
    $b=$find;
    $al=strlen($a);
    $bl=strlen($b);
    if($al===0 || $bl===0)return 0;
    $counter=0;
    for($i=0;$i<($al-$bl+1);$i++){
        $check=true;
        for($j=0;$j<$bl;$j++){
           if($a[$i+$j]!==$b[$j]){
               $check=false;
               break;
           }
        }
        if($check){
            $counter++;
        }
    }
    return $counter;
}

echo repeatInString('', ''); // 1
echo repeatInString('golgoli', 'gol'); // 2
echo repeatInString('sasasasaasassa', 'saas'); // 3