<?php
/*
$str=readline();
if(strlen($str)==0)$arr=[];
else $arr=str_split($str,1);


function check($arr){
    if(count($arr)==0)return true;
    $firstArr=$arr;
    $arr2=[];
    $check=true;
    while(end($arr)===')'||
          end($arr)===']'||
          end($arr)==='}')
        {
            array_unshift($arr2,end($arr));
            array_pop($arr);
            $check=false;
        }
    while(end($arr)==='('||
        end($arr)==='['||
        end($arr)==='{')
    {
        if($check) return false;
        array_unshift($arr2,end($arr));
        array_pop($arr);
    }
    $str=implode('',$arr2);
    $str=str_replace(['[','(','{'],['1','2','3'],$str);
    $str=str_replace([']',')','}'],['[','(','{'],$str);
    $str=str_replace(['1','2','3'],[']',')','}'],$str);
    $arr2=str_split($str,1);
    if(array_reverse($arr2)===array_slice($firstArr,-(count($arr2)))){
        return check($arr);
    }

    return false;
}

if(check($arr))echo 'YES';
else echo "NO";
*/

$str='[[]]';

function check(string $str):bool{
    $arr=[];
    $l=strlen($str);
    for($i=0;$i<$l;$i++){
        if($str[0]=='(' || $str[0]=='[' || $str[0]=='{'){
            $arr[]=$str[0];
            $str=substr($str,1);
        }
        elseif( ($str[0]==')' && end($arr)=='(')||
            ($str[0]==']' && end($arr)=='[')||
            ($str[0]=='}' && end($arr)=='{'))
        {
            array_pop($arr);
            $str=substr($str,1);
        }else{
            return false;
        }
    }
    if(count($arr)!=0) return false;
    return true;
}

if(check($str))echo 'YES';
else echo "NO";


