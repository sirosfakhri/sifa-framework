<?php

namespace Sifa\App\Core;

class Request
{
    private array $params;
    private string $method;
    private string $agent;
    private string $ip;
    private string $uri;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->uri = strtok($_SERVER['REQUEST_URI'], '?');
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->input($name);
    }


    public function params(): array
    {
        return $this->params;
    }

    public function method(): string
    {
        return $this->method;
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function input(string $key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }

    public function isset(string $key): bool
    {
        return isset($this->params[$key]);
    }

}