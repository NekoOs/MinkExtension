<?php

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @author Matt Stauffer <github account: @mattstauffer>
     * @author Neder Alfonso Fandiño Andrade <neafand@gmail.com>
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (startsWith($value, '"') && endsWith($value, '"')) {
            return substr($value, 1, -1);
        } elseif (startsWith($value, "'") && endsWith($value, "'")) {
            return substr($value, 1, -1);
        }
        return $value;
    }
}

if (!function_exists('startsWith')) {
    /**
     * verify if the haystack start with the needle
     *
     * @author Mr Hus <stackoverflow account: @MrHus>
     *
     * @param string $haystack
     * @param mixed $needle
     * @return bool
     */
    function startsWith($haystack, $needle)
    {
        return (substr($haystack, 0, strlen($needle)) === $needle);
    }
}

if (!function_exists('endsWith')) {
    /**
     * verify if the haystack end with the needle
     *
     * @author Mr Hus <stackoverflow account: @MrHus>
     *
     * @param string $haystack
     * @param mixed $needle
     * @return bool
     */
    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}