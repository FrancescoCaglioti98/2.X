<?php
namespace App\Classes\Fields;

use App\Classes\Fields\Boolean;

class Checkbox extends Boolean
{
    
    public function render(): string
    {
        return "<input type='checkbox' name='{$this->name}'>";
    }

}
