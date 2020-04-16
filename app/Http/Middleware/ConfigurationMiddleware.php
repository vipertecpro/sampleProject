<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConfigurationMiddleware
{
    protected $except = [
        'users',
        'dashboard'
    ];
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure $next
     * @param string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        return $next($request);
    }
}
