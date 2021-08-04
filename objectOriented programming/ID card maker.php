<?php


class Person
{
    private static $arr = [];
    public static function firstName($name = null)
    {
        self::$arr=[];
        if(is_string($name) && strlen($name)>2 && strlen($name)<16){
            if(empty(preg_match('/[0-9]+/',$name))){
                self::$arr['firstName']=$name;
            }
        }
        return new self;
    }

    public function lastName($lastName = null)
    {
        if(is_string($lastName) && strlen($lastName)>2 && strlen($lastName)<16){
            if(empty(preg_match('/[0-9]+/',$lastName))){
                self::$arr['lastName']=$lastName;
            }
        }
        return new self;
    }

    public function age($age = null)
    {
        if($age>0 && $age<131 && is_int($age)){
            self::$arr['age']=$age;
        }
        return new self;
    }

    public function setFather($father)
    {
        if($father instanceof Father && isset ($father->toArray()['age']) && isset(self::$arr['age'])
        && isset ($father->toArray()['lastName']) && isset(self::$arr['lastName'])){
            if($father->toArray()['age']>=(self::$arr['age']+18) && $father->toArray()['lastName']==self::$arr['lastName']){
                self::$arr['father']=$father->toArray();
            }
        }
        return new self;
    }

    public function toArray()
    {
        return self::$arr;
    }
}

class Father
{
    private static $arr = [];
    public static function firstName($name = null)
    {
        self::$arr=[];
        if(is_string($name) && strlen($name)>2 && strlen($name)<16){
            if(empty(preg_match('/[0-9]+/',$name))){
                self::$arr['firstName']=$name;
            }
        }
        return new self;
    }

    public function lastName($lastName = null)
    {
        if(is_string($lastName) && strlen($lastName)>2 && strlen($lastName)<16){
            if(empty(preg_match('/[0-9]+/',$lastName))){
                self::$arr['lastName']=$lastName;
            }
        }
        return new self;
    }

    public function age($age = null)
    {
        if($age>=18 && $age<131 && is_int($age)){
            self::$arr['age']=$age;
        }
        return new self;
    }

    public function toArray()
    {
        return self::$arr;
    }
}



