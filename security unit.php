<?php


function encrypt(string $str):string
{
    $length = strlen($str);
    $result = '';
    $counter = 1;
    for($i=0 ; $i < $length ; $i++){
        if($i == 0){
            $result .= ord($str[0])-96;
            $counter++;
        }elseif($str[$i] == $str[$i-1]){
            $result .= (ord($str[$i])-96)*$counter;
            $counter++;
        }else{
            $counter=2;
            $result .= ord($str[$i])-96;
        }
    }
    return $result;
}
function isSocialAccountInfo($str):bool
{
    return preg_match('/^([A-Z]{1}[a-zA-Z]+):www.[a-z0-9.]+\/[a-z]+$/',$str);
}
function secure($str):string
{
    $pattern ='/([A-Z]{1}[a-zA-Z]+:www.[a-z0-9.]+\/)([a-z]+)/';
    preg_match_all($pattern,$str,$matches);
    $count = count($matches[0]);
    for ($i = 0; $i < $count; $i++){
        $str = str_replace($matches[0][$i], $matches[1][$i].encrypt($matches[2][$i]), $str );
    }
    return $str;
}
echo '<pre>';
var_dump( secure('FirstName:Ali, LastName:Alavi, BirthDate:1990/02/02 Gender:male Instagram:www.instagram.com/aalavi Degree:Master Twitter:www.twiter.com/alaviii imdb:www.imdb.com/alavi'));
var_dump( encrypt('A'));
