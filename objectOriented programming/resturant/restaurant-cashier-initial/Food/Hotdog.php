<?php

namespace Food;

use Food\Food;

class Hotdog implements Food
{
    private $price = 52000;
    private $name = "Special Hotdog";

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }
}
