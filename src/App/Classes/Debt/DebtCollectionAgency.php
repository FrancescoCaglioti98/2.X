<?php

namespace App\Classes\Debt;

use App\Interfaces\DebtCollector;

class DebtCollectionAgency
{
    /**
     * metodo che accetta una classe che utilizza un'interfaccia specifica
     */
    public function collectDebt(DebtCollector $collector)
    {

        $owedAmount = mt_rand( 100, 1000);
        $collectedAmount = $collector->collect($owedAmount);

        return 'Collected €' . $collectedAmount . ' out of €' . $owedAmount;

    }
}
