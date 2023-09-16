<?php
namespace App\Classes\Debt;



use App\Interfaces\DebtCollector;

class CollectionAgency implements DebtCollector
{
    public function collect(float $owedAmount): float
    {
        $guaranteed_amount = $owedAmount * 0.50;

        return mt_rand( $guaranteed_amount, $owedAmount );
    }
    
}
