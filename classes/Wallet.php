<?php declare(strict_types=1);

class Wallet extends MoneyOperation
{
    private $currentValues;
    private $owner;

    function __construct(array $currentValues, string $owner)
    {
        $this->currentValues = $currentValues;
        $this->owner = $owner;
    }

	function getCurrencyValue(Currency $currency){
		return $this->currentValues[$currency->getName()];
	}

    function getTotalValue(): int
    {
        $totalValue = 0;

        foreach ($GLOBALS['currencies'] as $currency) {
			$totalValue += $this->getCurrencyValueInDefault($this, $currency);
        }

        return $totalValue;
    }

    public function getCurrentValues(): array
	{
		return $this->currentValues;
	}

    function compare(Wallet $anotherWallet): ?object
    {
        if ($this->getTotalValue() > $anotherWallet->getTotalValue())
            return $this;
        elseif ($anotherWallet->getTotalValue() > $this->getTotalValue())
            return $anotherWallet;
        else
            return null;
    }
}