<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('token'); // Get the token from the request

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $token = trim($token, "\"");

        // Find the user associated with the token
        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        if ($user->type == 'Read Only') {
            return response()->json(['message' => 'Your token is read only'], 401);
        }

        // Set the authenticated user
        // Auth::login($user);

        return $next($request);
    }
}
