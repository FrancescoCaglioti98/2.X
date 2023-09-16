<?php

namespace App\Interfaces;


interface DebtCollector
{

    public const COLLECTOR_RATE = 300;

    public function collect( float $owedAmount ): float;
    
}
