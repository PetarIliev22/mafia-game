<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestTiming
{
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);

        $response = $next($request);

        logger()->info('Request timing', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'total' => round(microtime(true) - $start, 3),
        ]);

        return $response;
    }
}