<?php

namespace App\Classes\Coffee\Traits;

trait CappuccinoTrait
{
    private function makeCappuccino()
    {
        echo static::class . ' is making Cappuccino' . '<br>';
    }
}
