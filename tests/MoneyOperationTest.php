<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MoneyOperationTest extends TestCase
{
    public function testAddUp()
    {
        require_once __DIR__."\..\classes\Currency.php";
		require_once __DIR__."\..\classes\Money.php";
        require_once __DIR__."\..\classes\MoneyOperation.php";
        require_once __DIR__."\..\classes\Wallet.php";

        $czk = new Currency('czk', 1);
        $eur = new Currency('eur', 26);
        $operation = new MoneyOperation();
        $wallet = new Wallet(['czk' => 100, 'eur' => 100], 'Tester');
        $operation->addUp($wallet, $czk, $eur);

        $this->assertEquals(2700, $operation->addUp($wallet, $czk, $eur));
    }

    public function testDeduct()
    {
        $czk = new Currency('czk', 1);
        $eur = new Currency('eur', 26);
        $operation = new MoneyOperation();
        $wallet = new Wallet(['czk' => 100, 'eur' => 100], 'Tester');
        $operation->deduct($wallet, $czk, $eur);

        $this->assertEquals(-2500, $operation->deduct($wallet, $czk, $eur));
    }

    public function testMultiply()
    {
        $czk = new Currency('czk', 1);
        $operation = new MoneyOperation();
        $wallet = new Wallet(['czk' => 100], 'Tester');
        $operation->multiply($wallet, $czk, 10);

        $this->assertEquals(1000, $operation->multiply($wallet, $czk, 10));
    }

    public function testDivide()
    {
        $czk = new Currency('czk', 1);
        $operation = new MoneyOperation();
        $wallet = new Wallet(['czk' => 100], 'Tester');
        $operation->divide($wallet, $czk, 10);

        $this->assertEquals(10, $operation->divide($wallet, $czk, 10));
    }
}