<?php

namespace App\Classes\Tools;

use App\Exception\CustomException;
use App\Exception\MissingBillingInfoException;
use Exception;
use InvalidArgumentException;

class Invoice
{
    public string $id;
    public float $amount;
    public string $description;
    public string $creditCardNumber;
    public Customer $customer;

    public function __construct( Customer $customer  )
    {
        $this->customer = $customer;
    }

    public function process(float $amount) : void
    {

        if( $amount <= 0 ){
            throw CustomException::InvalidInvoiceAmount();
        }

        if( empty( $this->customer->getBillingInfo() ) ){
            throw CustomException::MissingBillingInfo();
        }

        echo 'Processing $' . $amount . ' invoice -';

        sleep(1);

        echo 'OK';
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
