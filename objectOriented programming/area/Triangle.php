<?php


class Triangle implements Shape
{
    private $a;
    private $h;

    public function __construct($a, $h)
    {
        $this->a = $a;
        $this->h = $h;
    }
    public function getClassName()
    {
        return __CLASS__;
    }
    public function getArea(): float
    {
        return $this->h * $this->a / 2;
    }
}
