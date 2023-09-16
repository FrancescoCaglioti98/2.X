<?php

namespace App\Classes\Fields;


abstract class Field
{

    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract protected function render(): string;

}
