<?php

namespace App\Http\Front\Controllers;

use Illuminate\Http\JsonResponse;

class Context7Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'url' => 'https://context7.com/websites/myray_app',
            'public_key' => 'pk_HhX3Ptt0SOj5AslquUAbG',
        ]);
    }
}
