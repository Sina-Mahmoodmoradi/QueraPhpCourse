<?php


class PowersOfTwo
{
    private $current = 1;

    public function next()
    {
        $this->current *= 2;
        return $this;
    }

    public function get()
    {
        return $this->current;
    }
}


$pot = new PowersOfTwo();
echo $pot->get(); // 1
$pot->next();
echo $pot->get(); // 2
$pot->next()->next();
echo $pot->get(); // 8
