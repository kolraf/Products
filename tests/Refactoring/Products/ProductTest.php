<?php
declare(strict_types = 1);

namespace Tests\Refactoring\Products;

use Brick\Math\BigDecimal;
use PHPUnit\Framework\TestCase;
use Refactoring\Products\ProductService;
use Refactoring\Products\ProductServiceInterface;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function canIncrementCounterIfPriceIsPositive(): void
    {
        //given
        $p = $this->productWithPriceAndCounter(BigDecimal::ten(), 10);

        //when
        $p->incrementCounter();

        //then
        $this->assertEquals(11, $p->getCounter());
    }

    /**
     * @test
     */
    public function cannotChangePriceIfCounterIsNotPositive(): void
    {
        //given
        $p = $this->productWithPriceAndCounter(BigDecimal::zero(), 0);

        //when
        $p->changePriceTo(BigDecimal::ten());

        //then
        $this->assertEquals(BigDecimal::zero(), $p->getPrice());
    }

    /**
     * @test
     */
    public function canFormatDescription(): void
    {
        //expect
        $this->assertEquals("short *** long", $this->productWithDesc("short", "long")->formatDesc());
        $this->assertEquals("", $this->productWithDesc("short", "")->formatDesc());
        $this->assertEquals("", $this->productWithDesc("", "long2")->formatDesc());
    }

    /**
     * @test
     */
    public function canChangeCharInDescription(): void
    {
        //given
        $p = $this->productWithDesc("short", "long");

        //when
        $p->replaceCharFromDesc('s', 'z');

        //expect
        $this->assertEquals("zhort *** long", $p->formatDesc());
    }

    /**
     * @param BigDecimal $price
     * @param int $counter
     * @return ProductServiceInterface
     */
    private function productWithPriceAndCounter(BigDecimal $price, int $counter): ProductServiceInterface
    {
        return new ProductService($price, "desc", "longDesc", $counter);
    }

    /**
     * @param string $desc
     * @param string $longDesc
     * @return ProductServiceInterface
     */
    private function productWithDesc(string $desc, string $longDesc): ProductServiceInterface
    {
        return new ProductService(BigDecimal::ten(), $desc, $longDesc, 10);
    }
}
