<?php
namespace App\Classes\Fields;

use App\Classes\Fields\Field;

class Text extends Field
{
    
    public function render(): string
    {
        return "<input type='text' name='{$this->name}'>";
    }

}
