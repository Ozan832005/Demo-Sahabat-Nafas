<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerawatMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->isPerawat()) {
            return $next($request);
        }
        
        abort(403, 'Akses ditolak. Hanya perawat yang dapat mengakses halaman ini.');
    }
}