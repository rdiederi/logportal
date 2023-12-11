<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class LogFailedLoginAttempt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Event::listen(Failed::class, function ($event) use ($request) {
            // Log the failed login attempt with the user's IP address
            Log::warning('Failed login attempt', [
                'username' => $event->credentials['email'], // or 'username' depending on your auth config
                'ip' => $request->ip(),
            ]);
        });

        return $next($request);
    }
}
