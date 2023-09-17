<?php
declare(strict_types=1);

use App\Classes\Coffee\AllInOneCoffeMaker;
use App\Classes\Coffee\CappuccinoMaker;
use App\Classes\Coffee\CoffeeMaker;
use App\Classes\Coffee\LatteMaker;
use App\Classes\Debt\CollectionAgency;
use App\Classes\Debt\DebtCollectionAgency;
use App\Classes\Debt\DifferentCollectionAgency;

$current_directory = __DIR__;

$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';



$coffeMaker = new CoffeeMaker();
$coffeMaker->makeCoffee();
echo '<br>';
$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();
echo '<br>';
$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();
$cappuccinoMaker->makeCappuccinoOriginal();
echo '<br>';
$allInOne = new AllInOneCoffeMaker();
$allInOne->makeCoffee();
$allInOne->makeLatte();
$allInOne->makeCappuccino();