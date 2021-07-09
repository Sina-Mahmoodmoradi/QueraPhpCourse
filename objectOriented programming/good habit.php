<?php


class Person
{
    private $first_name;
    private $last_name;
    private $age;

    public function sayHello()
    {
        return "Hello!";
    }
    public function setFirstName($name)
    {
        $this->first_name =$name;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function setLastName($name)
    {
        $this->last_name =$name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function setAge($age)
    {
        $this->age =$age;
    }
    public function getAge()
    {
        return $this->age;
    }
}