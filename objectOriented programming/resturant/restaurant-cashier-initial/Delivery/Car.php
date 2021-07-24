<?php

namespace Delivery;

use Delivery\Delivery;

class Car implements Delivery
{
    private $name = "Car delivery";
    private $distance_factor = 21.2;

    public function getName()
    {
        return $this->name;
    }

    public function getDistanceFactor()
    {
        return $this->distance_factor;
    }
}
