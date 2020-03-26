<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConfigurationMiddleware
{
    protected $except = [
        'users'
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
        $adminModulesList = array_merge(explode('|', env('ADMIN_PANEL_MODULES')),$this->except);
        if(!in_array($request->segment(2),$adminModulesList, true)  ){

            dd(";");
            abort(404);
        }
        return $next($request);
    }
}
