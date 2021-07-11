<?php


trait FileLogger
{
    public function log($type, $message)
    {
        $log=date('Y-m-d H:i:s').' ['.$type.'] '.$message;
        if(!file_exists('quera.log')){
            file_put_contents('quera.log',$log);
        }else{
            if(filesize('quera.log')==0){
                file_put_contents('quera.log',$log);
            }else{
                file_put_contents('quera.log',"\n".$log,FILE_APPEND);
            }
        }
    }
}
