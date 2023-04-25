<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Closure;
use Illuminate\Http\Request;

class RemembersReferrer
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($referrer = $request->get('referrer')) {
            $request->session()->put('referrer', $referrer);
        }

        return $next($request);
    }
}
