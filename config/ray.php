<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lifetime Offer Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the lifetime license offer period. Set both start_date and
    | end_date to enable the special offer. Set to null to disable.
    |
    | Format: 'Y-m-d H:i:s' or any format parseable by Carbon
    |
    */

    'lifetime_offer' => [
        'start_date' => env('RAY_LIFETIME_OFFER_START', null), // e.g., '2024-11-29 00:00:00'
        'end_date' => env('RAY_LIFETIME_OFFER_END', null),     // e.g., '2024-12-02 23:59:59'
    ],

];
