<?php
declare(strict_types = 1);

namespace Refactoring\Products\Validator\Model;

class NotNullValidator implements Validator
{
    /**
     * @inheritDoc
     */
    public function isValid($value): bool
    {
        return $value !== null;
    }
}