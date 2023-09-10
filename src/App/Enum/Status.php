<?php

declare(strict_types=1);

namespace App\Enum;



class Status
{
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::DECLINED => 'Declined',
        self::PENDING => 'Pending',
        self::PAID => 'Paid'
    ];

}