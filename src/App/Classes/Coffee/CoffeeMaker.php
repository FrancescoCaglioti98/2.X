<?php

namespace App\Classes\Coffee;

class CoffeeMaker
{
    public function makeCoffee()
    {
        echo static::class . ' is making Coffee' . '<br>';
    }
}
