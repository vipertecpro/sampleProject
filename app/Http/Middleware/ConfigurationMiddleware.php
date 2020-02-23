<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigurationMiddleware
{

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
        $adminModulesList = explode('|', env('ADMIN_PANEL_MODULES'));
        if(!in_array($request->segment(2),$adminModulesList, true)){
            abort(404);
        }
        return $next($request);
    }
}
