<?php
declare(strict_types = 1);
include_once '../config/define.php';

use App\Classes\Amazon\Transaction as AmazonTransaction;
use App\Classes\Ebay\Transaction as EbayTransaction;

$AmazonTransaction = (new AmazonTransaction( 100, 'Transaction 1' ))
    ->addTax(8)
    ->applayDiscount(10);

$amount =  $AmazonTransaction->getAmount();
var_dump( $amount );
$AmazonTransaction = null;

echo '<br><br>';

$EbayTransaction = (new EbayTransaction( 200, 'Transaction 2' ))
    ->addTax(8)
    ->applayDiscount(20);

$amount =  $EbayTransaction->getAmount();
var_dump( $amount );
$EbayTransaction = null;