<?php
declare(strict_types = 1);

namespace Refactoring\Products;

use Refactoring\Products\CounterManager\CounterManager;
use Refactoring\Products\CounterManager\CounterManagerConfig;
use Refactoring\Products\CounterManager\CounterManagerInterface;
use Refactoring\Products\Model\Counter;
use Refactoring\Products\Model\Product;
use Refactoring\Products\ProductManager\ProductManager;
use Refactoring\Products\ProductManager\ProductManagerConfig;
use Refactoring\Products\ProductManager\ProductManagerInterface;
use Refactoring\Products\Validator\DataValidator;

class ProductFactory
{
    /**
     * @return ProductManagerInterface
     */
    public function createProductManager(): ProductManagerInterface
    {
        return new ProductManager(
            $this->createProduct(),
            $this->createCounterManager(),
            $this->createProductManagerConfig(),
            $this->createDataValidator()
        );
    }

    /**
     * @return CounterManagerInterface
     */
    private function createCounterManager(): CounterManagerInterface
    {
        return new CounterManager(
            $this->createCounter(),
            $this->createCounterManagerConfig(),
            $this->createDataValidator()
        );
    }

    /**
     * @return Product
     */
    private function createProduct(): Product
    {
        return new Product();
    }

    /**
     * @return ProductManagerConfig
     */
    private function createProductManagerConfig(): ProductManagerConfig
    {
        return new ProductManagerConfig();
    }

    /**
     * @return DataValidator
     */
    private function createDataValidator(): DataValidator
    {
        return new DataValidator();
    }

    /**
     * @return Counter
     */
    private function createCounter(): Counter
    {
        return new Counter();
    }

    /**
     * @return CounterManagerConfig
     */
    private function createCounterManagerConfig(): CounterManagerConfig
    {
        return new CounterManagerConfig();
    }
}