<?php

function findPhoneNumbers(string $str):array{

    $pattern='/(?:\s|^)((\+98\d{10})|(09\d{9}))(?:\s|$)/';
    preg_match_all($pattern,$str,$matches);
    $numbers=$matches[1];
    return $numbers;
}

function findHashtags(string $str):array{

    $pattern='/(?:\s|^)(\#[a-zA-Z0-9]{2,})(?:\s|$)/';
    preg_match_all($pattern,$str,$matches);
    $hashtags=$matches[1];
    return $hashtags;
}

function boldEmails(string $str):string{

    $pattern='/(\s|^)([\w.]+\@[a-zA-Z0-9]+\.[a-zA-Z]{3})(\s|$)/';
    $replace='\1<b>\2</b>\3';
    return preg_replace($pattern,$replace,$str);
}

echo "<pre>";
print_r(findPhoneNumbers("Sample phone number is +989121234567"));
print_r(findHashtags("Salam #goodMOrning khoobi#to #4yourlove #bi-man"));
print_r(boldEmails("Soalatono az info_test@Quera.ir ya info@Quera123.com ya test_#23@alaki.core beporsid"));

