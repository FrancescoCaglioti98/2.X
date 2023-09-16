<?php
namespace App\Classes\Fields;

use App\Classes\Fields\Boolean;

class Radio extends Boolean
{
    
    public function render(): string
    {
        return "<input type='radio' name='{$this->name}'>";
    }

}
