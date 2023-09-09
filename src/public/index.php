<?php
declare(strict_types = 1);

spl_autoload_register(function ($class) {

    $current_directory = __DIR__;

    $current_directory = explode('\\', $current_directory);
    array_pop($current_directory);
    $current_directory = implode( '/', $current_directory );


    $path = $current_directory . '/' . str_replace('\\', '/', $class) . '.php';
    
    require($path);

});



use App\Classes\Amazon\Transaction;

$trnsaction = (new Transaction( 200, 'Transaction 2' ))
    ->addTax(8)
    ->applayDiscount(20);

$amount =  $trnsaction->getAmount();
var_dump( $amount );
$trnsaction = null;