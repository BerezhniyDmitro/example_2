<?php

use Src\CheckBracketsSpecification;

require '../vendor/autoload.php';

$testExpression = '[5] * 3 - ( 4 - 7 * [3-6])';
$specification = new CheckBracketsSpecification($testExpression);
$result = $specification->isSatisfiedBy();
var_dump($result);
