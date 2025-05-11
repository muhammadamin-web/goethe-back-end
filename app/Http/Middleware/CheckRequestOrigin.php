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
        $origin = $request->headers->get('origin');
        
        // Agar origin null bo'lsa yoki goethe-front.uicgroup.tech domainidan kelgan bo'lsa
        if ($origin === null || strpos($origin, 'https://goethe-front.uicgroup.tech') !== false) {
            return $next($request);
        }
        
        return response()->json(['error' => 'Invalid request origin'], 403);
    }
}