<?php

class FileHelper
{
    public static function createFile($name, $address)
    {
        if($address==='')$address='.';
        touch($address.'/'.$name);
    }
    
    public static function createDirectory($name, $address)
    {
        if($address==='')$address='.';
        if(file_exists($address.'/'.$name))return;
        mkdir($address.'/'.$name,0777,true);
    }
    
    public static function editFile($name, $address, $content)
    {
        if($address==='')$address='.';
        if(file_exists($address.'/'.$name))file_put_contents($address.'/'.$name,$content);
    }
    
    public static function moveFile($from, $to)
    {
        if(!file_exists($from))return;
        if(!file_exists(dirname($to)))mkdir(dirname($to),0777,true);
        rename($from,$to);
    }
    
    public static function copyFile($from, $to)
    {
        if(!file_exists($from))return;
        if(!file_exists(dirname($to)))mkdir(dirname($to),0777,true);
        copy($from,$to);
    }

    public static function moveDirectory($from, $to)
    {
        rename($from,$to);
    }

    public static function copyDirectory($from, $to)
    {
        if($from==='')$from='.';
        if($to==='')$to='.';
        $list = scandir($from);
        unset($list[array_search('.', $list)]);
        if ($key = array_search('..', $list)) {
            unset($list[$key]);
        }

        mkdir($to);

        foreach ($list as $item){
            if(is_dir("$from/$item")){
                copyDirectory($from.'/'.$item,$to.'/'.$item);
            }else{
                copy($from.'/'.$item,$to.'/'.$item);
            }
        }
    }
    
    public static function deleteFile($name, $address)
    {
        if($address==='')$address='.';
        if(file_exists($address.'/'.$name))unlink($address.'/'.$name);
    }
    
    public static function deleteDirectory($address)
    {
        if(file_exists($address))rmdir($address);
    }
    
    public static function getFile($name, $address)
    {
        if($address==='')$address='.';
        if(file_exists($address.'/'.$name))return file_get_contents($address.'/'.$name);
        return '';
    }
    
    public static function listDirectory($address)
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
    
    public static function searchFile($name, $address)
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

    public static function formatBytes($bytes, $precision = 2)
    { 
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow)); 
        return round($bytes, $precision).' '.$units[$pow];
    }
}
