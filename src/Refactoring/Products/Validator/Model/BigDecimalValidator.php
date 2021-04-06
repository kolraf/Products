<?php
declare(strict_types = 1);

namespace Refactoring\Products\Validator\Model;

use Brick\Math\BigDecimal;

class BigDecimalValidator implements Validator
{
    /**
     * @inheritDoc
     */
    public function isValid($value): bool
    {
        return $value instanceof BigDecimal && $value->getSign() > 0;
    }
}