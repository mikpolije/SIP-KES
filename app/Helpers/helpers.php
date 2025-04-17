<?php

if (!function_exists('active_class')) {
    /**
     * Return 'active' class if the current request matches the given path or route.
     *
     * @param string|array $pathOrRoute Path (e.g., 'main/polikia') or route name
     * @param string $class Class to return if active (default: 'active')
     * @return string
     */
    function active_class($pathOrRoute, $class = 'active')
    {

        $paths = (array) $pathOrRoute;


        foreach ($paths as $path) {
            if (request()->is($path) || request()->routeIs($path)) {
                return $class;
            }
        }

        return '';
    }
}