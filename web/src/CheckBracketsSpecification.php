<?php

namespace Src;

/**
 * Class CheckBracketsSpecification
 */
class CheckBracketsSpecification implements ISpecification
{
    /**
     * @var array массив соответствий открытых скобок закрытым
     */
    private $mapBrackets = [
        '[' => ']',
        '(' => ')'
    ];

    /**
     * @var string выражение которое подвергается проверке
     */
    private $expression;

    /**
     * CheckBracketsSpecification constructor.
     *
     * @param string $expression тестируемая строка на правильность скобок
     */
    public function __construct($expression)
    {
        $this->expression = str_split($expression);
    }

    /**
     * Метод проверки строки на скобки
     *
     * @return bool
     */
    public function isSatisfiedBy()
    {
        $availableOpeningBracket = array_keys($this->mapBrackets);
        $availableClosingBracket = array_values($this->mapBrackets);
        $stackOpeningBrackets = [];

        foreach ($this->expression as $currentChar) {
            if (in_array($currentChar, $availableOpeningBracket)) {
                $stackOpeningBrackets[] = $currentChar;
            }

            if (! in_array($currentChar, $availableClosingBracket)) {
                continue;
            }

            $openBracket = array_pop($stackOpeningBrackets);
            $closedBracket = $this->mapBrackets[$openBracket];
            if ($currentChar !== $closedBracket) {
                return false;
            }
        }

        return empty($stackOpeningBrackets);
    }
}
