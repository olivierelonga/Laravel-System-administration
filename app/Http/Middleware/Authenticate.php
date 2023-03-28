<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) { 
            if($request->routeIs('operators.*')){
                return route('operators.login');
            }
            if($request->routeIs('customers.*')){
                return route('customers.login');
            }

            return route('operators.home');
        }
    }
}
