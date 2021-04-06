<?php
declare(strict_types = 1);

namespace Refactoring\Products\ProductManager;

use Brick\Math\BigDecimal;
use Exception;
use Ramsey\Uuid\Uuid;
use Refactoring\Products\CounterManager\CounterManagerInterface;
use Refactoring\Products\Model\Counter;
use Refactoring\Products\Model\Product;
use Refactoring\Products\Validator\DataValidator;

class ProductManager implements ProductManagerInterface
{
    private const DEFAULT_EMPTY_DESCRIPTION = '';
    private const PATTERN_DESCRIPTION = '%s *** %s';

    /**
     * @var Product
     */
    private $product;

    /**
     * @var CounterManagerInterface
     */
    private $counterManager;

    /**
     * @var ProductManagerConfig
     */
    private $config;

    /**
     * @var DataValidator
     */
    private $validator;

    /**
     * ProductManager constructor.
     * @param Product $product
     * @param CounterManagerInterface $counterManager
     * @param ProductManagerConfig $config
     * @param DataValidator $validator
     */
    public function __construct(
        Product $product,
        CounterManagerInterface $counterManager,
        ProductManagerConfig $config,
        DataValidator $validator
    ) {
        $this->product = $product;
        $this->counterManager = $counterManager;
        $this->config = $config;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function fillProduct(
        ?BigDecimal $price,
        ?string $desc,
        ?string $longDesc,
        ?int $counter
    ): self {
        $this->product->setSerialNumber(Uuid::uuid4());
        $this->product->setPrice($price);
        $this->product->setDesc($desc);
        $this->product->setLongDesc($longDesc);
        $this->counterManager->setValue($counter);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @inheritDoc
     */
    public function getCounter(): Counter
    {
        return $this->counterManager
            ->getCounter();
    }

    /**
     * @inheritDoc
     */
    public function decrementCounter(): void
    {
        $this->counterManager
            ->decrementCounter();
    }

    /**
     * @inheritDoc
     */
    public function incrementCounter(): void
    {
        $this->counterManager
            ->incrementCounter();
    }

    /**
     * @inheritDoc
     */
    public function changePriceTo(?BigDecimal $newPrice): void
    {
        $this->counterManager->changePriceTo();
        $this->validator->isValid([$newPrice], $this->config->getChangePriceToValidators());
    }

    /**
     * @inheritDoc
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void
    {
        $this->validator->isValid(
            [
                $this->product->getLongDesc(),
                $this->product->getDesc()
            ],
            $this->config->getReplaceCharFromDescValidators()
        );

        $this->product->setLongDesc(
            str_replace($charToReplace, $replaceWith, $this->product->getLongDesc())
        );
        $this->product->setDesc(
            str_replace($charToReplace, $replaceWith, $this->product->getDesc())
        );
    }

    /**
     * @inheritDoc
     */
    public function formatDesc(): string
    {
        try {
            $this->validator->isValid(
                [$this->product->getLongDesc(), $this->product->getDesc()],
                $this->config->getFormatDescValidators()
            );
        } catch (Exception $e) {
            return self::DEFAULT_EMPTY_DESCRIPTION;
        }

        return sprintf(
            self::PATTERN_DESCRIPTION,
            $this->product->getDesc(),
            $this->product->getLongDesc()
        );
    }
}