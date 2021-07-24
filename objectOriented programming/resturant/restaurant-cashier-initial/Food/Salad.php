<?php

namespace Food;

use Food\Food;

class Salad implements Food
{
    private $price = 31000;
    private $name = "Caesar salad";

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }
}
