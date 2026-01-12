<?php

namespace App\Support;

use Carbon\Carbon;

class LifetimeOffer
{
    public static function isActive(): bool
    {
        $startDate = config('ray.lifetime_offer.start_date');
        $endDate = config('ray.lifetime_offer.end_date');

        return $startDate && $endDate
            && Carbon::parse($startDate)->isPast()
            && Carbon::parse($endDate)->isFuture();
    }

    public static function expirationDate(): ?Carbon
    {
        $endDate = config('ray.lifetime_offer.end_date');

        return $endDate ? Carbon::parse($endDate) : null;
    }

    public static function startDate(): ?Carbon
    {
        $startDate = config('ray.lifetime_offer.start_date');

        return $startDate ? Carbon::parse($startDate) : null;
    }
}
