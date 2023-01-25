<?php

namespace Sifa\App\Utilities;

class Url
{
    public static function current() : string
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";

        // Append the host(domain name, ip) to the URL.
        $url.= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL
       return $url.= $_SERVER['REQUEST_URI'];
    }

    public static function current_route() : string
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }
}