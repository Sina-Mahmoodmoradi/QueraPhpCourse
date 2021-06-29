<?php

    function encrypt($str,$n){
        for($i=0;$i<strlen($str);$i++){
            if(ord($str[$i])>ord('a')-1) {
                if((ord('z')-ord($str[$i]))>=(abs($n)%26)){
                    $str[$i] = chr(ord($str[$i]) + (abs($n)%26));
                }else{
                    $str[$i]=chr(ord('a')+(abs($n%26)-(ord('z')-ord($str[$i])))-1);
                }
            }else{
                if((ord('Z')-ord($str[$i]))>=(abs($n)%26)){
                    $str[$i] = chr(ord($str[$i]) + (abs($n)%26));
                }else{
                    $str[$i]=chr(ord('A')+(abs($n%26)-(ord('Z')-ord($str[$i])))-1);
                }
            }
        }
        return $str;
    }

    echo encrypt('aAbcdefghijklmnopqrstuvwxyzYZ',5);
    echo '<br>';
    echo decrypt('fFghijklmnopqrstuvwxyzabcdeDE',5);

    function decrypt($str,$n){
        for($i=0;$i<strlen($str);$i++){
            if(ord($str[$i])>ord('a')-1) {
                if((ord($str[$i])-ord('a'))>=(abs($n)%26)){
                    $str[$i] = chr(ord($str[$i]) - (abs($n)%26));
                }else{
                    $str[$i]=chr(ord('z')-((abs($n%26)-(ord($str[$i])-(ord('a')))))+1);
                }
            }else{
                if((ord($str[$i])-ord('A'))>=(abs($n)%26)){
                    $str[$i] = chr(ord($str[$i]) - (abs($n)%26));
                }else{
                    $str[$i]=chr(ord('Z')-((abs($n%26)-(ord($str[$i])-(ord('A')))))+1);
                }
            }
        }
        return $str;
    }