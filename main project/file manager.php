<?php

//---------------------------------------
function createFile($name, $address)
{
    if($address==='')$address='.';
    touch($address.'/'.$name);
}
//---------------------------------------
function createDirectory($name, $address){
    if($address==='')$address='.';
    if(file_exists($address.'/'.$name))return;
    mkdir($address.'/'.$name,0777,true);
}
//---------------------------------------
function getFile($name, $address):string
{
    if($address==='')$address='.';
    if(file_exists($address.'/'.$name))return file_get_contents($address.'/'.$name);
    return '';
}
//---------------------------------------
function editFile($name, $address, $content)
{
    if($address==='')$address='.';
    if(file_exists($address.'/'.$name))file_put_contents($address.'/'.$name,$content);
}
//---------------------------------------
function moveFile($from, $to)
{
    if(!file_exists($from))return;
    if(!file_exists(dirname($to)))mkdir(dirname($to),0777,true);
    rename($from,$to);
}
//---------------------------------------
function copyFile($from, $to)
{
    if(!file_exists($from))return;
    if(!file_exists(dirname($to)))mkdir(dirname($to),0777,true);
    copy($from,$to);
}
//---------------------------------------
function deleteFile($name, $address){
    if($address==='')$address='.';
    if(file_exists($address.'/'.$name))unlink($address.'/'.$name);
}
//---------------------------------------
function deleteDirectory($address)
{
    if(file_exists($address))rmdir($address);
}
//---------------------------------------
function listDirectory($address)
{
    if(!file_exists($address))return [];
    if($address==='')$address='.';
    $list = scandir($address);
    unset($list[array_search('.', $list)]);
    if ($key = array_search('..', $list)) {
        unset($list[$key]);
        array_unshift($list, '..');
    }
    $dirs=[];
    $files=[];
    foreach ($list as $item){
        if(is_dir($address.'/'.$item)){
            $dirs[]=$item;
        }else{
            $files[]=$item;
        }
    }
    return array_merge($dirs, $files);
}
//---------------------------------------
function searchFile($name, $address)
{
    if($address ==='')$address='.';
    if(!file_exists($address))return [];
    $list = scandir($address);
    unset($list[array_search('.', $list)]);
    if ($key = array_search('..', $list)) {
        unset($list[$key]);
    }
    $results = array();
    foreach ($list as $item){
        if(is_dir($address.'/'.$item)){
            $result=searchFile($name,$address.'/'.$item);
            if(!empty($result))$results=array_merge($results,$result);
        }else{
            if($name==$item)$results[]=$address.'/'.$item;
        }
    }
    return $results;
}

createDirectory("test", "");
createDirectory("tests", ".");
createDirectory("test1", "test");
createDirectory("test2", "test/test1");
createFile("file1.txt", ".");
createFile("file2.txt", "test");
createFile("file3.txt", "test/test1");
createFile("file4.txt", "test/test1");
createFile("file4.txt", "test/test1/test2");
editFile("file1.txt", ".", "content1");
editFile("file4.txt", "test/test1/test2", "content2");
copyFile("file1.txt", "test/file5.txt");
deleteFile("file3.txt", "test/test1");
deleteDirectory("tests");
moveFile("test/file5.txt", "test/file6.txt");
echo getFile("file6.txt", "test");
echo "\n";
print_r(searchFile("file4.txt", "test"));