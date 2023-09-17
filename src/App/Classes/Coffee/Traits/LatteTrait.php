<?php

namespace App\Classes\Coffee\Traits;

trait LatteTrait
{
    
    public function makeLatte()
    {
        echo static::class . ' is making Latte' . '<br>';
    }
    
}
