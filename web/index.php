<?php

require_once '../vendor/autoload.php';

$pizza = new \Src\Decorator\BasicPizza();
echo $pizza->getCost() . PHP_EOL;

$cheezePizza = new \Src\Decorator\CheezeDecorator($pizza);
echo $cheezePizza->getCost() . PHP_EOL;
echo $cheezePizza->getDescription() . PHP_EOL;

$pomidoro = new \Src\Decorator\TomatoDecorator($cheezePizza);
echo $pomidoro->getDescription();
echo $pomidoro->getCost();
