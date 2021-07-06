<?php

class Vector
{
    public $x;
    public $y;
    public $z;

    public function __construct($x, $y, $z)
    {
        $this->x=$x;
        $this->y=$y;
        $this->z=$z;
    }

    public function magnitude()
    {
        return sqrt(($this->x**2) + ($this->y**2) + ($this->z**2));
    }

    public function add($vector)
    {
        $this->x += $vector->x;
        $this->y += $vector->y;
        $this->z += $vector->z;
    }

    public function subtract($vector)
    {
        $this->x -= $vector->x;
        $this->y -= $vector->y;
        $this->z -= $vector->z;
    }

    public function product($n)
    {
        $this->x *= $n;
        $this->y *= $n;
        $this->z *= $n;
    }

    public function dotProduct($vector)
    {
        $x=$vector->x * $this->x;
        $y=$vector->y * $this->y;
        $z=$vector->z * $this->z;
        return $x+$y+$z;
    }

    public function crossProduct($vector)
    {
        $pVector=new vector(0, 0, 0);
        $pVector->x=$this->y*$vector->z - $this->z*$vector->y;
        $pVector->y=$this->z*$vector->x - $this->x*$vector->z;
        $pVector->z=$this->x*$vector->y - $this->y*$vector->x;
        return $pVector;
    }
}


$vector1 = new Vector(1, 2, 3);
$vector2 = new Vector(1, 2, 3);
$vector1->add($vector2);
echo '<pre>';
var_dump($vector1);

echo "\n";

$vector1 = new Vector(1, 2, 3);
$vector2 = new Vector(1, 2, 3);
$vector1->subtract($vector2);
var_dump($vector1);

echo "\n";

$vector = new Vector(1, 2, 3);
$vector->product(5);
var_dump($vector);

echo "\n";

$vector1 = new Vector(1, 2, 3);
$vector2 = new Vector(1, 2, 3);
var_dump($vector1->dotProduct($vector2));

echo "\n";

$vector1 = new Vector(1, 2, 3);
$vector2 = new Vector(4, 5, 6);
var_dump($vector1->crossProduct($vector2));