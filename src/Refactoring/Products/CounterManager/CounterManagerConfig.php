<?php
declare(strict_types = 1);

namespace Refactoring\Products\CounterManager;
use Refactoring\Products\Validator\Model\NotNegativeNumberValidator;
use Refactoring\Products\Validator\Model\NotNullValidator;
use Refactoring\Products\Validator\Model\Validator;

class CounterManagerConfig
{
    private const MESSAGE_NULL_COUNTER = 'null counter';
    private const MESSAGE_NEGATIVE_COUNTER = 'Negative counter';

    /**
     * @return array|Validator[]
     */
    public function getBeforeActionValidators(): array
    {
        return [
            self::MESSAGE_NULL_COUNTER => new NotNullValidator(),
        ];
    }

    /**
     * @return array|Validator[]
     */
    public function getAfterActionValidators(): array
    {
        return [
            self::MESSAGE_NEGATIVE_COUNTER => new NotNegativeNumberValidator(),
        ];
    }
}