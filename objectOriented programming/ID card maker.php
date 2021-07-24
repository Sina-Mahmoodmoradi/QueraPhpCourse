<?php


class Person
{
    private static $arr = [];
    public static function firstName($name = null)
    {
        if(is_string($name) && strlen($name)>2 && strlen($name)<16){
            if(empty(preg_match('/[0-9]+/',$name))){
                self::$arr['firstname']=$name;
            }
        }
        return new self;
    }

    public function lastName($lastName = null)
    {
        if(is_string($lastName) && strlen($lastName)>2 && strlen($lastName)<16){
            if(empty(preg_match('/[0-9]+/',$lastName))){
                self::$arr['lastname']=$lastName;
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
        if($father instanceof Father && isset ($father->toArray()['age'])){
            if()
        }
    }

    public function toArray()
    {
        // TODO: Implement toArray method here
    }
}

class Father
{
    public static function firstName($name = null)
    {
        // TODO: Implement firstName method here
    }

    public function lastName($lastName = null)
    {
        // TODO: Implement lastName method here
    }

    public function age($age = null)
    {
        // TODO: Implement age method here
    }

    public function toArray()
    {
        // TODO: Implement toArray method here
    }
}



