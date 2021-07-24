<?php

namespace Delivery;

use Delivery\Delivery;

class Bike implements Delivery
{
    private $name = "Bike delivery";
    private $distance_factor = 14.3;

    public function getName()
    {
        return $this->name;
    }

    public function getDistanceFactor()
    {
        return $this->distance_factor;
    }
}
