<?php

namespace Invoice;
include '../delivery/delivery.php';
include '../food/food.php';
use Food as f;
use delivery as d;

class InvoiceRecord
{
    private $food;
    private $delivery;

    public function __construct(f\Food $food, d\Delivery $delivery)
    {
        $this->food = $food;
        $this->delivery = $delivery;
    }
    public function getFood()
    {
        return $this->food;
    }
    public function getDelivery()
    {
        return $this->delivery;
    }
    public function getFinalPrice($distance)
    {
        return $this->food->getprice() + $this->delivery->getDistanceFactor() * $distance;
    }
}
