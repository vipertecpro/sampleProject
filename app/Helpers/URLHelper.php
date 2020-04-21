<?php

use Illuminate\Contracts\Routing\UrlGenerator;

if (!function_exists('adminAsset')) {
    /**
     * Return Admin Assets Path
     *
     * @param string $path
     * @return string
     */
    function adminAsset($path = ''){
        return url('adminAssets/'.$path);
    }
}
if (!function_exists('publicAsset')) {
    /**
     * Get the path to the assets symlink folder.
     *
     * @param  string  $path
     * @return string
     */
    function publicAsset($path){

        return url('assets/'.$path);
    }
}
