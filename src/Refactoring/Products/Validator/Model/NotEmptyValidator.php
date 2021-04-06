<?php
declare(strict_types = 1);

namespace Refactoring\Products\Validator\Model;

class NotEmptyValidator implements Validator
{
    /**
     * @inheritDoc
     */
    public function isValid($value): bool
    {
        return !empty($value);
    }
}