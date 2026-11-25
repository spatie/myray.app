<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lifetime Offer Configuration
    |--------------------------------------------------------------------------
    |
    | Override the current lifetime license campaign dates as needed.
    | The offer is hidden outside this period.
    |
    | Format: 'Y-m-d H:i:s' or any format parseable by Carbon
    |
    */

    'lifetime_offer' => [
        'start_date' => env('RAY_LIFETIME_OFFER_START') ?: '2026-11-25 00:00:00+01:00',
        'end_date' => env('RAY_LIFETIME_OFFER_END') ?: '2026-12-02 00:00:00+01:00',
        'text' => env('RAY_LIFETIME_OFFER_TEXT', '⚡️ Ray Black Friday sale! Discounts and lifetime licenses available for'),
    ],

];
