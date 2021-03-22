<?php declare(strict_types=1);

abstract class Money{

    private $name;
    private $rate;

    public function __construct(string $name, int $rate)
    {
        $this->name = $name;
        $this->rate = $rate;
        $GLOBALS['currencies'][] = $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRate(): int
    {
        return $this->rate;
    }
}