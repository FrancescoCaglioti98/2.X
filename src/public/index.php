<?php
declare(strict_types=1);

use App\Classes\Debt\CollectionAgency;
use App\Classes\Debt\DebtCollectionAgency;
use App\Classes\Debt\DifferentCollectionAgency;

$current_directory = __DIR__;

$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$service = new DebtCollectionAgency();

echo $service->collectDebt( new CollectionAgency() );
echo '<br>';
echo $service->collectDebt( new DifferentCollectionAgency() );