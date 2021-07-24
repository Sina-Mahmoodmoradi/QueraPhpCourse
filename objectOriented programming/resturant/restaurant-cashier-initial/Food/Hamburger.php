<?php

namespace Food;

use Food\Food;

class Hamburger implements Food
{
    private $price = 65000;
    private $name = "Special Hamburger";

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }
}
