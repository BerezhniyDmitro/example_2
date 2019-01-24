<?php


namespace Src\Decorator;


class BasicPizza extends Pizza
{
    private $cost = 5;

    public function getCost()
    {
        return $this->cost;
    }
}
