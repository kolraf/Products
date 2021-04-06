<?php
declare(strict_types = 1);

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\UuidInterface;

interface ProductServiceInterface
{
    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface;

    /**
     * @return BigDecimal
     */
    public function getPrice(): BigDecimal;

    /**
     * @return string
     */
    public function getDesc(): string;

    /**
     * @return string
     */
    public function getLongDesc(): string;

    /**
     * @return int
     */
    public function getCounter(): int;

    /**
     * @throws \Exception
     *
     * @return void
     */
    public function decrementCounter(): void;

    /**
     * @throws \Exception
     *
     * @return void
     */
    public function incrementCounter(): void;

    /**
     * @param BigDecimal|null $newPrice
     * @throws \Exception
     *
     * @return void
     */
    public function changePriceTo(?BigDecimal $newPrice): void;

    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws \Exception
     *
     * @return void
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void;

    /**
     * @return string
     */
    public function formatDesc(): string;
}