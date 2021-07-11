<?php

include 'FileLogger.php';
class LogAuth
{
    use FileLogger;
    public function greet()
    {
        $this->log('INFO','Welcome new user');
    }
}

$log=new LogAuth;
$log->log('error','this is an error');