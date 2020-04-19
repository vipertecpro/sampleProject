<?php
if (!function_exists('adminAsset')) {
    /**
     * Return Admin Assets Path
     *
     * @param string $path
     * @return string
     */
    function adminAsset($path){
        return url('adminAssets/'.$path);
    }
}
if (!function_exists('publicAsset')) {
    /**
     * Return Theme Assets Path
     *
     * @param string $path
     * @return string
     */
    function publicAsset($path){

        return url('assets/'.$path);
    }
}
