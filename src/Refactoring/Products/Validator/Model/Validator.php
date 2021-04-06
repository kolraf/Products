<?php
declare(strict_types = 1);

namespace Refactoring\Products\Validator\Model;

interface Validator
{
    /**
     * @param $value
     *
     * @return bool
     */
    public function isValid($value): bool;
}