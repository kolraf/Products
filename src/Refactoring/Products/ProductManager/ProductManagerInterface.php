<?php
declare(strict_types = 1);

namespace Refactoring\Products\ProductManager;

use Exception;
use Brick\Math\BigDecimal;
use Refactoring\Products\Model\Counter;
use Refactoring\Products\Model\Product;

interface ProductManagerInterface
{
    /**
     * @param BigDecimal|null $price
     * @param string|null $desc
     * @param string|null $longDesc
     * @param int|null $counter
     *
     * @return $this
     */
    public function fillProduct(
        ?BigDecimal $price,
        ?string $desc,
        ?string $longDesc,
        ?int $counter
    ): self;

    /**
     * @return Product
     */
    public function getProduct(): Product;

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
     * @param BigDecimal|null $newPrice
     * @throws Exception
     *
     * @return void
     */
    public function changePriceTo(?BigDecimal $newPrice): void;

    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws Exception
     *
     * @return void
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void;

    /**
     * @return string
     */
    public function formatDesc(): string;
}