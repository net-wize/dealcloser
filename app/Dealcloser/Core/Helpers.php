<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use App\Dealcloser\Core\Settings\Settings;

if ( ! function_exists('setActive')) {
    /**
     * @param $path
     * @param string $active
     * @return string
     */
    function setActive($path, $active = 'is-active')
    {
        return Request::path() == $path ? $active : '';
    }
}

if ( ! function_exists('settings')) {
    /**
     * @return mixed
     */
    function settings()
    {
        return Cache::rememberForever('settings', function () {
            return Settings::first();
        });
    }
}