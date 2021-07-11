<?php

trait StdOutLogger
{
    public function log($type, $message)
    {
        echo date('Y-m-d H:i:s').' ['.$type.'] '.$message."\n";
    }
}

