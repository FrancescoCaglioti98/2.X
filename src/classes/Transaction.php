<?php

declare(strict_types=1);


class Transaction
{
    private float $amount;
    private string $description;


    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function addTax(float $rate) : Transaction
    {
        $this->amount += $this->amount * $rate / 100;
        return $this;
    }

    public function applayDiscount(float $rate) : Transaction
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
