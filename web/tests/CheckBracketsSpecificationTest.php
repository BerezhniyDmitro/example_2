<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\CheckBracketsSpecification;
use Src\ISpecification;

/**
 * Class CheckBracketsSpecificationTest тест спецификации поиска скобок в выражении
 */
class CheckBracketsSpecificationTest extends TestCase
{
    /**
     * Метод тестирует успешное создание спецификации
     */
    public function testIsImplementISpecification() {
        $specification = new CheckBracketsSpecification('');
        $this->assertInstanceOf(ISpecification::class, $specification);
    }

    /**
     * Метод тестирует успешное нахождение скобок
     *
     * @param string $expression выражение которое содержит верное количество скобок
     * @dataProvider isSuccessSatisfiedByDataProvider
     *
     */
    public function testIsSuccessSatisfiedBy($expression)
    {
        $specification = new CheckBracketsSpecification($expression);

        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Метод тестирует НЕуспешное нахождение скобок
     *
     * @param string $expression выражение которое содержит верное количество скобок
     * @dataProvider isNotSuccessSatisfiedByDataProvider
     *
     */
    public function testIsNotSuccessSatisfiedBy($expression)
    {
        $specification = new CheckBracketsSpecification($expression);

        $this->assertFalse($specification->isSatisfiedBy());
    }

    /**
     * Провайдер правильных данных
     *
     * @return array
     */
    public function isSuccessSatisfiedByDataProvider()
    {
        return [
            ['[5] * 3 - ( 4 - 7 * [3-6])'],
            ['(5) * 3 - [4 - 7 * (3-6)]'],
            ['((**))[[--]]'],
            ['([**])[(--)]'],
        ];
    }

    /**
     * Провайдер неправильных данных
     *
     * @return array
     */
    public function isNotSuccessSatisfiedByDataProvider()
    {
        return [
            ['(['],
            [')]'],
            ['(([t]e]s)t'],
            ['( 5 * 3 [ 6 ) - 6]'],
            ['(2[ 6 ) - 6]'],
            [' [ 2 ] [ 6 ) - (6 ) '],
        ];
    }
}
