<?php
declare(strict_types = 1);
include_once '../config/define.php';



$transaction = (new Transaction( 100, 'Transaction 1' ))
    ->addTax(8)
    ->applayDiscount(10);
    
$amount =  $transaction->getAmount();

$transaction = null;



var_dump( $amount );