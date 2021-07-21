<?php

$json=file_get_contents('students.json');
$arr=json_decode($json,true);
$ids=[];
$result=[];
$now=strtotime('4 oct 2019');
foreach($arr as $stu){
    static $counter=0;
    $check=true;
    for($i=0;$i<$counter;$i++){
        if($ids[$i]==$stu['id']){
            $check=false;
        }
    }
    if($check){
        $ids[]=$stu['id'];
        $counter++;
        $age=(int)(($now-strtotime($stu['bdate']))/(365*24*3600));
        $result[$stu['id']]=['bdate'=>$stu['bdate'],
                            'name'=>ucwords(strtolower($stu['name'])),
                            'age'=>(string)$age
                            ];
    }
}
file_put_contents('students_fixed.json',json_encode($result));