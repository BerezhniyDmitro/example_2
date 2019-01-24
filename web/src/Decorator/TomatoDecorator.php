<?php


namespace Src\Decorator;


class TomatoDecorator extends Stuffing
{
    private $cost = 0.99;

    /**
     * @var Pizza
     */
    private $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getCost()
    {
        return $this->pizza->getCost() + $this->cost;
    }

    public function getDescription()
    {
        return 'Пицца с томатами';
    }
}
