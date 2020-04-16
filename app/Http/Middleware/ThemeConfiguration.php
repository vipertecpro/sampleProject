<?php

namespace App\Http\Middleware;

use App\Theme;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\ParameterBag;

class ThemeConfiguration
{
    /**
     * Custom parameters.
     *
     * @var ParameterBag
     *
     * @api
     */
    public $attributes;
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
        $getActivatedTheme = Theme::where('activate','true')->first();
        if($getActivatedTheme === null){
            abort(501,'Theme is not activated.');
        }
        $request->attributes->set('themePages',$getActivatedTheme->pages_path);
        $request->attributes->set('appThemeLayout',$getActivatedTheme->layout_path);
        return $next($request);
    }
}
