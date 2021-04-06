<?php
declare(strict_types = 1);

namespace Refactoring\Products\CounterManager;

use Refactoring\Products\Model\Counter;
use Refactoring\Products\Validator\DataValidator;

class CounterManager implements CounterManagerInterface
{
    /**
     * @var Counter
     */
    private $counter;

    /**
     * @var CounterManagerConfig
     */
    private $config;

    /**
     * @var DataValidator
     */
    private $validator;

    /**
     * CounterManager constructor.
     * @param Counter $counter
     * @param CounterManagerConfig $config
     * @param DataValidator $validator
     */
    public function __construct(
        Counter $counter,
        CounterManagerConfig $config,
        DataValidator $validator
    ) {
        $this->counter = $counter;
        $this->config = $config;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function setValue(?int $value): self
    {
        $this->counter->setValue($value);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCounter(): Counter
    {
        return $this->counter;
    }

    /**
     * @inheritDoc
     */
    public function decrementCounter(): void
    {
        $this->validator->isValid(
            [$this->counter->getValue()],
            $this->config->getBeforeActionValidators()
        );

        $this->counter->setValue(
            $this->counter->getValue() - 1
        );

        $this->validator->isValid(
            [$this->counter->getValue()],
            $this->config->getAfterActionValidators()
        );
    }

    /**
     * @inheritDoc
     */
    public function incrementCounter(): void
    {
        $this->validator->isValid(
            [$this->counter->getValue()],
            $this->config->getBeforeActionValidators()
        );

        $this->counter->setValue(
            $this->counter->getValue() + 1
        );

        $this->validator->isValid(
            [$this->counter->getValue()],
            $this->config->getAfterActionValidators()
        );
    }

    /**
     * @inheritDoc
     */
    public function changePriceTo(): void
    {
        $this->validator->isValid(
            [$this->counter->getValue()],
            $this->config->getBeforeActionValidators()
        );
    }


}