<?php

namespace App\Controllers;

use App\View;

class InvoicesController
{
    public function index(): string
    {
        return (string) View::render('invoices/index');
    }

    public function createInvoice(): string
    {
        return (string) View::render('invoices/create');
    }

    public function store()
    {
        $amount = $_POST["amount"];
        var_dump($amount);
    }
}
