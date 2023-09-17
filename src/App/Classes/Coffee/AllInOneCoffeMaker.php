<?php

namespace App\Classes\Coffee;

use App\Classes\Coffee\Traits\CappuccinoTrait;
use App\Classes\Coffee\Traits\LatteTrait;

class AllInOneCoffeMaker extends CoffeeMaker
{

    use CappuccinoTrait{
        CappuccinoTrait::makeCappuccino as public;
    }
    use LatteTrait;

}
