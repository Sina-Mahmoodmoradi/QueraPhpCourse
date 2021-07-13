<?php


class Rectangle implements Shape
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function getClassName()
    {
        return __CLASS__;
    }
    public function getArea(): float
    {
        return $this->a*$this->b;
    }
}
