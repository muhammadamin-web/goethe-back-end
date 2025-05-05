<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRequestOrigin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // So'rov kelayotgan URL manzilini tekshirish
        if (strpos($request->headers->get('origin'), '127.0.0.1:3000') === false) {
            return response()->json(['error' => 'Invalid request origin'], 403);
        }

        return $next($request);
    }
}