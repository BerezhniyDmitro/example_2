<?php

namespace Src;

/**
 * Interface ISpecification интерфейс спецификации
 */
interface ISpecification
{
    /**
     * Метод проверки
     *
     * @return boolean
     */
    public function isSatisfiedBy();
}
