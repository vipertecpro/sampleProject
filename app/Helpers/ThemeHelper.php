<?php

use App\Theme;
use Illuminate\Support\Str;

if (!function_exists('updateTheme')) {
    /**
     * Get Themes from resources > themes folder and update into database
     */
    function updateThemes():void {
        $getThemesPath = glob(base_path('resources/views/themes') . '/*' , GLOB_ONLYDIR);
        foreach ($getThemesPath as $key => $value){
            $themeName = Str::afterLast($value, '/');
            $getThemesName = [
                'name'              => $themeName,
                'pages_path'        => 'themes.'.$themeName.'.pages.',
                'layout_path'       => 'themes.'.$themeName.'.layouts.app',
                'screenshot_path'   => file_exists($value.'/screenshot.jpg') ? 'resources/views/themes/'.$themeName.'/screenshot.jpg' : '',
            ];
            Theme::updateOrCreate([
                'name'              => $themeName,
            ],$getThemesName);
        }
    }
}
