<?php
declare(strict_types = 1);

namespace Refactoring\Products\Validator;

use Exception;
use Refactoring\Products\Validator\Model\Validator;

class DataValidator
{
    /**
     * @param array $values
     * @param array|Validator[] $validators
     * @throws Exception
     *
     * @return bool
     */
    public function isValid(array $values, array $validators): bool
    {
        foreach ($validators as $message => $validator) {
            foreach ($values as $value) {
                if (!$validator->isValid($value)) {
                    throw new Exception($message);
                }
            }
        }

        return true;
    }
}