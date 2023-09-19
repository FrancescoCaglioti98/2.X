<?php

declare(strict_types=1);

use App\Classes\Amazon\Transaction;
use App\Classes\Tools\Invoice;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$test_ar = [
    'a' => 1,
    'b' => 2,
    'c' => 3
];
$serialized_test_ar = serialize( $test_ar );

echo serialize(true) . '<br>';
echo serialize(1) . '<br>';
echo serialize(2.5) . '<br>';
echo serialize('hello world') . '<br>';
echo serialize([1, 2, 3]) . '<br>';
echo $serialized_test_ar . '<br>';


var_dump( unserialize( $serialized_test_ar ));



echo '<br><br><br>';


$invoice = new Invoice(100, 'Test serialization Object', '0123456789');

$invoice_serialized = serialize($invoice);

var_dump( $invoice_serialized );
echo '<br>';
$invoice2 = unserialize( $invoice_serialized );
var_dump( $invoice2 );
echo '<br>';
var_dump( $invoice === $invoice2 );
