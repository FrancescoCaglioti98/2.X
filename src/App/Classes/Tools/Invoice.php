<?php

namespace App\Classes\Tools;

class Invoice
{
    public string $id;
    public float $amount;
    public string $description;
    public string $creditCardNumber;

    public function __construct( float $amount, string $description, string $creditCardNumber )
    {
     
        $this->id = uniqid( 'invoice_n_' );
        $this->amount = $amount;
        $this->description = $description;
        $this->creditCardNumber = $creditCardNumber;
        
    }


    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'creditCardNumber' => base64_encode( $this->creditCardNumber ),
            'test' => 'test01'
        ];
    }


    public function __unserialize(array $data): void
    {
        $this->id = $data["id"];
        $this->amount = $data["amount"];
        $this->description = $data["description"];
        $this->creditCardNumber = base64_decode( $data["creditCardNumber"] );
    }



}
