<?php

namespace Sifa\App\Core\Routing;

/**
 * @property static array $routes
 * @method static get($uri, $action=null, array $middleware = [])
 * @method static post($uri, $action=null, array $middleware = [])
 * @method static put($uri, $action=null, array $middleware = [])
 * @method static patch($uri, $action=null, array $middleware = [])
 * @method static delete($uri, $action=null, array $middleware = [])
 * @method static option($uri, $action=null, array $middleware = [])
 */

class Route
{
   private static array $routes = [];

    private static function add(string|array $methods,string $uri,string|callable|array $action = null, array $middleware = []): void
    {
        $methods = is_array($methods) ? $methods : [$methods];
        self::$routes[] = ['methods' => $methods, 'uri' => $uri, 'action' => $action, 'middleware' => $middleware];
    }

    public static function routes(): array
    {
        return self::$routes;
    }

    public static function __callStatic($name, $arguments)
    {
        self::add($name,...$arguments);
    }



}