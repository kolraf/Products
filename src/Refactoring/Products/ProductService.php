<?php
declare(strict_types = 1);

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\UuidInterface;
use Refactoring\Products\ProductManager\ProductManagerInterface;

class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductManagerInterface
     */
    private $productManager;

    /**
     * Product constructor.
     * @param BigDecimal|null $price
     * @param string|null $desc
     * @param string|null $longDesc
     * @param int|null $counter
     */
    public function __construct(?BigDecimal $price, ?string $desc, ?string $longDesc, ?int $counter)
    {
        $this->productManager = (new ProductFactory())->createProductManager()
            ->fillProduct($price, $desc, $longDesc, $counter);
    }

    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface
    {
        return $this->productManager
            ->getProduct()
            ->getSerialNumber();
    }

    /**
     * @return BigDecimal
     */
    public function getPrice(): BigDecimal
    {
        return $this->productManager
            ->getProduct()
            ->getPrice();
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->productManager
            ->getProduct()
            ->getDesc();
    }

    /**
     * @return string
     */
    public function getLongDesc(): string
    {
        return $this->productManager
            ->getProduct()
            ->getLongDesc();
    }

    /**
     * @return int
     */
    public function getCounter(): int
    {
        return $this->productManager
            ->getCounter()
            ->getValue();
    }

    /**
     * @throws \Exception
     *
     * @return void
     */
    public function decrementCounter(): void
    {
        $this->productManager->decrementCounter();
    }

    /**
     * @throws \Exception
     *
     * @return void
     */
    public function incrementCounter(): void
    {
        $this->productManager->incrementCounter();
    }

    /**
     * @param BigDecimal|null $newPrice
     * @throws \Exception
     *
     * @return void
     */
    public function changePriceTo(?BigDecimal $newPrice): void
    {
        $this->productManager->changePriceTo($newPrice);
    }

    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws \Exception
     *
     * @return void
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void
    {
        $this->productManager->replaceCharFromDesc($charToReplace, $replaceWith);
    }

    /**
     * @return string
     */
    public function formatDesc(): string
    {
        return $this->productManager->formatDesc();
    }
}
