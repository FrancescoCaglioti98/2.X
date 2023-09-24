<?php
namespace App\Exception;

use Exception;

class CustomException extends Exception
{

    public static function InvalidInvoiceAmount()
    {
        return new static('Invalid Invoice Amount');
    }

    public static function MissingBillingInfo()
    {
        return new static('Missing Billing Info');
    }
    
}
