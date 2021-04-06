<?php
declare(strict_types = 1);

namespace Refactoring\Products\CounterManager;

use Exception;
use Refactoring\Products\Model\Counter;

interface CounterManagerInterface
{
    /**
     * @param int|null $value
     *
     * @return $this
     */
    public function setValue(?int $value): self;

    /**
     * @return Counter
     */
    public function getCounter(): Counter;

    /**
     * @throws Exception
     *
     * @return void
     */
    public function decrementCounter(): void;

    /**
     * @throws Exception
     *
     * @return void
     */
    public function incrementCounter(): void;

    /**
     * @throws Exception
     *
     * @return void
     */
    public function changePriceTo(): void;
}