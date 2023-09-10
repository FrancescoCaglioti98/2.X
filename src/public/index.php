<?php
declare(strict_types=1);

$current_directory = __DIR__;

$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


use App\Classes\Ebay\Transaction;

$trnsaction = (new Transaction(200, 'Transaction 2'))
    ->addTax(8)
    ->applayDiscount(20);

$amount = $trnsaction->getAmount();
var_dump($amount);
$trnsaction = null;