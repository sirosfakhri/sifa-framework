<?php

namespace Sifa\App\Core\Routing;

/**
 * @property static array $routes
 * @method static get($uri,$action=null)
 * @method static post($uri,$action=null)
 * @method static put($uri,$action=null)
 * @method static patch($uri,$action=null)
 * @method static delete($uri,$action=null)
 * @method static option($uri,$action=null)
 */

class Route
{
   private static array $routes = [];

    private static function add(string|array $methods,string $uri,string|callable|array $action = null)
    {
        $methods = is_array($methods) ? $methods : [$methods];
        self::$routes[] = ['methods' => $methods, 'uri' => $uri, 'action' => $action];
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