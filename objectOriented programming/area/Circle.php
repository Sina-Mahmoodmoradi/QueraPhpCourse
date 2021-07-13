<?php


class Circle implements Shape
{
    private $r;

    public function __construct($r)
    {
        $this->r = $r;
    }
    public function getClassName()
    {
        return __CLASS__;
    }
    public function getArea(): float
    {
        return $this->r**2*pi();
    }
}

