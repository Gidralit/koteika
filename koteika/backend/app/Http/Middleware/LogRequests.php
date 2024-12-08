<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle($request, Closure $next)
    {
        Log::info('Request', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
                'payload' => $request->all(),
        ]);

        return $next($request);
    }
}
