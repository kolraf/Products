<?php
declare(strict_types = 1);

namespace Refactoring\Products\ProductManager;

use Refactoring\Products\Validator\Model\BigDecimalValidator;
use Refactoring\Products\Validator\Model\NotEmptyValidator;
use Refactoring\Products\Validator\Model\Validator;

class ProductManagerConfig
{
    private const MESSAGE_NEW_PRICE_NULL = 'new price null';
    private const MESSAGE_NULL_OR_EMPTY_DESC = 'null or empty desc';

    /**
     * @return array|Validator[]
     */
    public function getChangePriceToValidators(): array
    {
        return [
             self::MESSAGE_NEW_PRICE_NULL => new BigDecimalValidator(),
        ];
    }

    /**
     * @return array|Validator[]
     */
    public function getReplaceCharFromDescValidators(): array
    {
        return [
            self::MESSAGE_NULL_OR_EMPTY_DESC => new NotEmptyValidator(),
        ];
    }

    /**
     * @return array|Validator[]
     */
    public function getFormatDescValidators(): array
    {
        return [
            self::MESSAGE_NULL_OR_EMPTY_DESC => new NotEmptyValidator(),
        ];
    }
}