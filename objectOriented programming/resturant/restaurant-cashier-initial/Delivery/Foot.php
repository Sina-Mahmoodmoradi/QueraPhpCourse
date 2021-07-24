<?php

namespace Delivery;

use Delivery\Delivery;

class Foot implements Delivery
{
    private $name = "Delivery on foot";
    private $distance_factor = 16.8;

    public function getName()
    {
        return $this->name;
    }

    public function getDistanceFactor()
    {
        return $this->distance_factor;
    }
}
