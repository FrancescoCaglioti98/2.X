<?php

declare(strict_types=1);

namespace App\Classes\Amazon;

use App\Enum\Status;
use InvalidArgumentException;

class Transaction
{
    private float $amount;
    private string $description;

    private string $status;

    public function __construct(float $amount, string $description)
    {

        echo "Loaded Amazon Transaction<br>";

        $this->amount = $amount;
        $this->description = $description;

        $this->status = Status::PENDING;
    }

    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;
        return $this;
    }

    public function applayDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;
        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    public function setStatus( string $status ) : Transaction
    {

        if( !isset( Status::ALL_STATUSES[$status] ) ) {
            throw new InvalidArgumentException("Invalid Status Used");
        }

        $this->status = $status;
        return $this;

    }

    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        // echo "Transaction complete<br>";
    }
}
