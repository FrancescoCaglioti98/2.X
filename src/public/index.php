<?php
declare(strict_types=1);

$current_directory = __DIR__;

$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


use App\Classes\Amazon\Transaction as AmazonTransaction;
use App\Enum\Status;

// use App\Classes\Ebay\Transaction as EbayTransaction;
// $EbayTransaction = new EbayTransaction(200, 'Transaction 2');



$AmazonTransaction = new AmazonTransaction(200, 'Transaction 2');
$AmazonTransaction->setStatus(Status::PAID);
var_dump( $AmazonTransaction->getStatus() );
