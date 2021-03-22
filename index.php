<?php declare(strict_types=1);

require 'classes/Money.php';
require 'classes/Currency.php';
require 'classes/MoneyOperation.php';
require 'classes/Wallet.php';

$czk = new Currency('czk', 1);
$eur = new Currency('eur', 26);
$usd = new Currency('usd', 21);
//$btc = new Currency('btc', 1000000);

$oldas = new Wallet([$czk->getName() => 100, $eur->getName() => 1], 'Oldřich');
$andys = new Wallet([$usd->getName() => 100, $eur->getName() => 100, $czk->getName() => 0], 'Andy');

$operation = new MoneyOperation();

$addUp = $operation->addUp($oldas,$czk,$eur);
$operation->printInCurrency($addUp, $czk);

$addUp2 = $operation->addUp($oldas,$eur,$czk);
$operation->printInCurrency($addUp2, $eur);

$addUp3 = $operation->addUp($andys,$usd,$eur);
$operation->printInCurrency($addUp3, $eur);

$addUp4 = $operation->addUp($andys,$eur,$usd);
$operation->printInCurrency($addUp4, $usd);

$deduct = $operation->deduct($oldas,$eur,$usd);
$operation->printInCurrency($deduct, $czk);

$multiply = $operation->multiply($oldas, $czk, 5);
$operation->printInCurrency($multiply, $czk);

$divide = $operation->divide($oldas, $czk, 5);
$operation->printInCurrency($divide, $usd);

$operation->printInCurrency($oldas->getTotalValue(), $eur);