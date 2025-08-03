<?php

// app/Http/Middleware/RemoveCSP.php

namespace App\Http\Middleware;

use Closure;

class RemoveCSP
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (app()->environment('local')) {
            $response->headers->remove('Content-Security-Policy');
        }

        return $response;
    }
}
