<?php

declare(strict_types=1);

namespace App\Classes\Amazon;

use InvalidArgumentException;

class Transaction
{
    private float $amount;
    private string $description;

    private string $status;



    public const STATUS_PAID = 'paid';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::STATUS_DECLINED => 'Declined',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_PAID => 'Paid'
    ];


    public function __construct(float $amount, string $description)
    {

        echo "Loaded Amazon Transaction<br>";

        $this->amount = $amount;
        $this->description = $description;
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

        if( ! isset( self::ALL_STATUSES[$status] ) ) {
            throw new InvalidArgumentException("Invalid Status Used");
        }

        $this->status = $status;

        return $this;

    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        // echo "Transaction complete<br>";
    }
}
