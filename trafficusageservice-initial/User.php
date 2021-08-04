<?php

class User
{
    public $username;
    public $name;
    public $age;

    public function __construct($username, $name, $age)
    {
        $this->username = $username;
        $this->name = $name;
        $this->age = $age;
    }

    public function __toString()
    {
        return $this->username;
    }
}
