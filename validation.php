<?php

function validateEmail(string $email): bool
{
    $pattern = '/^[\w.]+@[a-z0-9]+\.[a-z]{3}$/i';
    return preg_match($pattern, $email);
}

function validatePhone(string $phone): bool
{
    $pattern = '/^09[\d]{9}$/';
    return preg_match($pattern, $phone);

}

function validateNationalCode(string $code): bool
{
    if(!preg_match('/^[\d]{10}$/', $code))return false;
    $check = true;
    for ($i = 0; $i < 9; $i++) {
        if ($code[$i] != $code[$i + 1]) {
            $check=false;
            break;
        }
    }
    if($check)return false;
    $A=(int)$code[9];
    $B=0;
    for ($i = 0; $i < 9; $i++) {
        $B+=($code[$i]*(10-$i));
    }
    $C=$B%11;
    if($A==$C && $A<2)return true;
    if($A==11-$C)return true;
    return false;
}

function validateCreditCard(string $num):bool
{
    if(!preg_match('/^[\d]{16}$/', $num))return false;

    $arr=[];
    for($i=0;$i<16;$i++){
        if($i%2==0){
            $a=(int)$num[$i]*2;
            if($a>9)$a-=9;
            $arr[]=$a;
        }else{
            $arr[]=(int)$num[$i];
        }
    }
    $sum=array_sum($arr);
    if($sum%10==0)return true;
    return false;
}

echo '<pre>';
var_dump(validateEmail('sample@school.edu'), // true
validateEmail('invalud@invalid'), // false
validatePhone('09215546321'), // true
validatePhone('093311111111'), // false
validateNationalCode('0023652411'),// true
validateNationalCode('2920534947'), // false
validateCreditCard('6274129005473742'), // true
validateCreditCard('6037701062355273')); // false)00000000000