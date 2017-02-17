<?php

if (!function_exists('isFilterApplied')) {
    /**
     * Returns the CSS class representation for each HTTP method.
     *
     * @param string $filter
     * @param string $value
     *
     * @return boolean
     */
    function isFilterApplied(string $filter, string $value = null)
    {
        if (!request()->exists($filter)) {
            return false;
        }

        if (is_null($value)) {
            return true;
        }

        return request()->input($filter) == $value;
    }
}
