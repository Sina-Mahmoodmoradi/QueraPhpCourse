<?php

function getArea(Shape $a): string
{
    return $a->getClassName().': '.$a->getArea();
}
