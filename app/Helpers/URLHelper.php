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
