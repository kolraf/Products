<?php
declare(strict_types = 1);

namespace Refactoring\Products\Model;

class Counter
{
    /**
     * @var int|null
     */
    private $value;

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int|null $value
     */
    public function setValue(?int $value): void
    {
        $this->value = $value;
    }
}