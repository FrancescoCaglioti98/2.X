<?php
declare(strict_types=1);

namespace App\Classes\Ebay;


class Transaction
{
    private float $amount;
    private string $description;

    private const STATUS_PAID = 'paid';
    private const STATUS_PENDING = 'pending';
    private const STATUS_DECLINED = 'declined';

    public function __construct(float $amount, string $description)
    {
        echo "Loaded Ebay Transaction<br>";
        $this->amount = $amount;
        $this->description = $description;

        echo self::STATUS_PAID;
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

    /**
     * Destructor
     */
    public function __destruct()
    {
        // echo "Transaction complete<br>";
    }


}