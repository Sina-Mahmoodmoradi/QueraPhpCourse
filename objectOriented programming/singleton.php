<?php


trait Singleton
{
    private static $instance=null;
    public static function getInstance(){
        if(self::$instance===null)
            self::$instance= new self;
        return self::$instance;
    }
    private function __construct(){}
}

class a
{
    use Singleton;
    public $name;
    public function setname($s){
        $this->name=$s;
    }
}

$sin=a::getInstance();
var_dump($sin);