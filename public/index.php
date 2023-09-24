<?php
declare(strict_types=1);


use App\Classes\Tools\Customer;
use App\Classes\Tools\Invoice;
use App\Exception\MissingBillingInfoException;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

echo '<pre>';

$invoice = new Invoice( new Customer() );

try {
    $invoice->process( 25 );
} catch ( Exception $e ) {
    echo $e->getMessage() . ' ' . $e->getFile(). ' on line ' . $e->getLine() . '<br>';
} finally {
    echo 'Finally Block';
}
