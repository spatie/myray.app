<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemembersReferrer
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($referrer = $request->get('referrer')) {
            $request->session()->put('referrer', $referrer);
        }

        return $next($request);
    }
}
