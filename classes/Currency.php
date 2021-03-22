<?php declare(strict_types=1);

require_once __DIR__."\..\classes\Money.php";

class Currency extends Money
{
    public function __construct(string $name, int $rate)
    {
        parent::__construct($name, $rate);
    }
}