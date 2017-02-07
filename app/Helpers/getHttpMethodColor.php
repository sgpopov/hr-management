<?php

use Illuminate\Support\Str;

if (!function_exists('httpMethodColor')) {
    /**
     * Returns the CSS class representation for each HTTP method.
     *
     * @param string $method
     *
     * @return string
     */
    function httpMethodColor(string $method)
    {
        $method = Str::upper($method);

        if (Str::contains($method, 'GET')) {
            return 'text-success';
        }

        if (Str::contains($method, 'POST')) {
            return 'text-warning';
        }

        if (Str::contains($method, 'PUT') || Str::contains($method, 'PATCH')) {
            return 'text-primary';
        }

        if (Str::contains($method, 'DELETE')) {
            return 'text-danger';
        }

        return '';
    }
}
