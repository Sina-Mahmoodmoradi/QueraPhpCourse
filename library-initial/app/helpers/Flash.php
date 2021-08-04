<?php
session_start();
class Flash
{
    public static function set($type, $message)
    {
        $_SESSION['type'] =$type;
        $_SESSION['message'] =$message;
    }

    public static function get()
    {
        if(!isset($_SESSION['type']) || !isset($_SESSION['message']))return null;
        return [
            'type' => $_SESSION['type'],
            'message' => $_SESSION['message']
        ];
    }
}
