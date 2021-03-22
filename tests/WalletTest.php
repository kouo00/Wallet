<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
{
    public function testGetTotalValue()
    {
        require_once __DIR__."\..\classes\Money.php";
        require_once __DIR__."\..\classes\MoneyOperation.php";
        require_once __DIR__."\..\classes\Wallet.php";

        $wallet = new Wallet(['czk' => 1, 'eur' => 1, 'usd' => 1], 'Jan');

        $this->assertEquals(48, $wallet->getTotalValue());
    }

    public function testCompare()
    {
        $wallet1 = new Wallet(['czk' => 100, 'eur' => 1], 'Jan');
        $wallet2 = new Wallet(['czk' => 100, 'eur' => 1], 'Jan');

        $this->assertEquals(null, $wallet1->compare($wallet2));
    }

    public function testCompare2()
    {
        $wallet1 = new Wallet(['czk' => 100], 'Jan');
        $wallet2 = new Wallet(['czk' => 100, 'eur' => 1], 'Jan');

        $this->assertEquals($wallet2, $wallet1->compare($wallet2));
    }
}