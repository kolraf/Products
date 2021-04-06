<?php
declare(strict_types = 1);

namespace Refactoring\Products\Model;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\UuidInterface;

class Product
{
    /**
     * @var UuidInterface
     */
    private $serialNumber;

    /**
     * @var BigDecimal|null
     */
    private $price;

    /**
     * @var string|null
     */
    private $desc;

    /**
     * @var string|null
     */
    private $longDesc;

    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface
    {
        return $this->serialNumber;
    }

    /**
     * @param UuidInterface $serialNumber
     */
    public function setSerialNumber(UuidInterface $serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return BigDecimal|null
     */
    public function getPrice(): ?BigDecimal
    {
        return $this->price;
    }

    /**
     * @param BigDecimal|null $price
     */
    public function setPrice(?BigDecimal $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getDesc(): ?string
    {
        return $this->desc;
    }

    /**
     * @param string|null $desc
     */
    public function setDesc(?string $desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @return string|null
     */
    public function getLongDesc(): ?string
    {
        return $this->longDesc;
    }

    /**
     * @param string|null $longDesc
     */
    public function setLongDesc(?string $longDesc): void
    {
        $this->longDesc = $longDesc;
    }
}