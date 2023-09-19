<?php
declare(strict_types=1);

use App\Classes\Amazon\Transaction;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

echo '<pre>';

$amazon1_1 = new Transaction(20, 'Test Compare Objects');
$amazon1_2 = new Transaction(100, 'Test Compare Objects 1');

var_dump( $amazon1_1 == $amazon1_2 );
echo '<br>';
var_dump( $amazon1_1 === $amazon1_2 );
echo '<br>';

echo '<br>';
echo '<br>';
$amazon2_1 = new Transaction(20, 'Test Compare Objects');
$amazon2_2 = new Transaction(20, 'Test Compare Objects');

var_dump( $amazon2_1 == $amazon2_2 );
echo '<br>';
var_dump( $amazon2_1 === $amazon2_2 );
echo '<br>';


echo '<br>';
echo '<br>';
$amazon3_1 = new Transaction(20, 'Test Compare Objects');
$amazon3_2 = $amazon3_1;

var_dump( $amazon3_1 == $amazon3_2 );
echo '<br>';
var_dump( $amazon3_1 === $amazon3_2 );
echo '<br>';

echo '<br>';
$amazon3_2->amount = 50;
var_dump($amazon3_1);
echo '<br>';
var_dump($amazon3_2);