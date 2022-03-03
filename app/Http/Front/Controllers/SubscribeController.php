<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeRequest;
use App\Services\Ray;
use Exception;
use Illuminate\Support\Facades\Http;

class SubscribeController
{
    public function __invoke(SubscribeRequest $request)
    {
        $response = Http::post('https://spatie.be/mailcoach/subscribe/'.config('services.mailcoach.subscription_uuid'), [
            'email' => $request->email,
            'tags' => 'downloaded-ray',
        ]);

        if (! $response->successful()) {
            try {
                throw new Exception("Could not subscribe at myray.app: `{$request->email}`");
            } catch (Exception $exception) {
                report($exception);
            }
        }

        flash()->success('Thank you for subscribing!');

        return back();
    }
}
