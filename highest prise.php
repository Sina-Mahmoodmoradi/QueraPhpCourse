<?php


    function isHighestPrise(){
        $data=$GLOBALS["data"];
        $name;
        $max=0;
        if(count($data)===0){
            return null;
        }else{
            $n=count($data);
            for($i=0;$i<$n;$i++){
                if($data[$i]['price']>=$max){
                    $max=$data[$i]['price'];
                    $name=$data[$i]['name'];
                }
            }
        }
        return $name;
    }
    
    echo isHighestPrise();