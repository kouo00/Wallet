<?php declare(strict_types=1);

class MoneyOperation
{
    public function printInCurrency(int $value, Currency $currency, int $round = 2): void
    {
        print_r(round(($value / $currency->getRate()), $round) . ' ' . strtoupper($currency->getName()) . '<br>');
    }

    public function getCurrencyValueInDefault(Wallet $wallet, Currency $currency): int
    {
    	if (key_exists($currency->getName(), $wallet->getCurrentValues()))
        	return $wallet->getCurrencyValue($currency) * $currency->getRate();
    	else
    		return 0;
    }

    public function addUp(Wallet $wallet, Currency $currencyA, Currency $currencyB): int
    {
        $a = $this->getCurrencyValueInDefault($wallet, $currencyA);
        $b = $this->getCurrencyValueInDefault($wallet, $currencyB);

        return $a + $b;
    }

    public function deduct(Wallet $wallet, Currency $currencyA, Currency $currencyB): int
    {
        $a = $this->getCurrencyValueInDefault($wallet, $currencyA);
        $b = $this->getCurrencyValueInDefault($wallet, $currencyB);

        return $a - $b;
    }

    public function multiply(Wallet $wallet, Currency $currencyA, int $times): int
    {
        $a = $this->getCurrencyValueInDefault($wallet, $currencyA);

        return $a * $times;
    }

    public function divide(Wallet $wallet, Currency $currencyA, int $times): int
    {
        $a = $this->getCurrencyValueInDefault($wallet, $currencyA);

        return $a / $times;
    }
}