<?php


namespace Src\Decorator;


class CheezeDecorator extends Stuffing
{
    private $cost = 1.2;

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
        return 'Пицца с сыром';
    }
}
