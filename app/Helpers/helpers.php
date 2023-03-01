<?php


if (!function_exists('base_path')){
    function base_path() : string
    {
        return __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..';
    }
}

if (!function_exists('env')){
    function env(string $key) : string
    {
        return $_ENV[$key];
    }
}

if (!function_exists('route')){
    function route(string $url) : string
    {
        return env('APP_URL').$url;
    }
}

if (!function_exists('asset')){
    function asset(string $url) : string
    {
        return base_path().DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.$url;
    }
}

if (!function_exists('view')){
    function view(string $path,array $data = []): void
    {
        extract($data);
        $path = str_replace('.',DIRECTORY_SEPARATOR,$path);
        $fullPath = base_path().DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$path.'.php';
        include_once $fullPath;
    }
}

if (!function_exists('str_contains')){
    function str_contains(string $str,string $needle, bool $case_sensitive = false): bool
    {
        return $case_sensitive ? strpos($str,$needle) : stripos($str,$needle);
    }
}