<?php
namespace App\Classes;

class Invoices
{
    public function index() : string
    {
        return 'This is the invoices page';
    }

    public function createInvoice() : string
    {
        return '<form action="/invoices/create" method="post"><label for="amount">Amount</label><input type="text" name="amount" id="amount"></form>';
    }

    public function store()
    {
        $amount = $_POST["amount"];
        var_dump( $amount );
    }
    
}
