<?php

namespace App\Http\Middleware;
Use Log;
Use Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (condition) {
        //     # code...
        // }
        Log::debug("Test");
        parent::redirectTo($request);
        return redirect('login');
    }
}
