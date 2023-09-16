<?php
namespace App\Classes\Debt;



use App\Interfaces\DebtCollector;

class DifferentCollectionAgency implements DebtCollector
{

    public function collect(float $owedAmount): float
    {
        return $owedAmount * 0.90;
    }
    
}
