<?php

declare(strict_types=1);

namespace App\Classes\Amazon;

use App\Enum\Status;
use InvalidArgumentException;

class Transaction
{
    public float $amount;
    private string $description;
    private float $tax = 0;
    private float $discount = 0;
    private float $processed_amount = 0;

    private string $status;

    static public int $count = 0;

    public function __construct(float $amount, string $description)
    {

        // echo "Loaded Amazon Transaction<br>";

        $this->amount = $amount;
        $this->description = $description;

        $this->status = Status::PENDING;

        self::$count++;
    }

    private function addTax(float $rate): Transaction
    {
        $this->tax = $rate;
        return $this;
    }

    private function applayDiscount(float $rate): Transaction
    {
        $this->discount = $rate;
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

    private function setStatus(string $status): Transaction
    {

        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new InvalidArgumentException("Invalid Status Used");
        }

        $this->status = $status;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function process() : string
    {

        $this->addTax( 22 );
        $this->applayDiscount( 5 );
        $this->setStatus('pending');

        $new_amount = $this->amount + ($this->amount * $this->tax / 100);
        $new_amount = $new_amount - ($new_amount * $this->discount / 100);
        
        $this->processed_amount = $new_amount;

        $response = "Processing " . $this->amount . "€ with " . $this->tax . "% Tax Rate and " . $this->discount . "% Discount";
        $response .= "<br>";
        $response .= "<br>";
        $response .= "The new amount is " . $new_amount . "€";
        return $response;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        // echo "Transaction complete<br>";
    }
}
