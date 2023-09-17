<?php

namespace App\Classes\Coffee;

use App\Classes\Coffee\CoffeeMaker;
use App\Classes\Coffee\Traits\CappuccinoTrait;

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait{
        CappuccinoTrait::makeCappuccino as public makeCappuccinoOriginal;
    }
    
    public function makeCappuccino()
    {
        echo 'MAKING Cappuccino<br>';
    }

}
