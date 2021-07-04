<?php
if(empty(file_get_contents($_FILES['file']['tmp_name'])))exit('[]');
move_uploaded_file($_FILES['file']['tmp_name'],'csvfile.csv');

$file=fopen('csvfile.csv','r');

$index=0;
$arr=[];
$keys[]=fgetcsv($file,0,',');
foreach($keys[0] as &$key)$key=trim($key);
$NOK=count($keys[0]);//number of keys
$arr2=[];
while($arr[]=fgetcsv($file,0,',')){
    for($i=0;$i<$NOK;$i++){
        $arr2[$index][$keys[0][$i]]=trim($arr[$index][$i]);
    }
    $index++;
}

fclose($file);

echo json_encode($arr2);