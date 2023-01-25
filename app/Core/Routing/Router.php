<?php

namespace Sifa\App\Core\Routing;

use Sifa\App\Core\Request;

class Router
{
    private Request $request;
    private array $routes;
    private $current_route;

    const CONTROLLERS_PATH = '\Sifa\App\Controllers\\';

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
    }

    public function findRoute(Request $request)
    {
       foreach ($this->routes as $route){
           if (in_array($request->method(),$route['methods']) && $request->uri() === $route['uri']){
               return $route;
           }
        }

        return null;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        # 405 : Invalid Request Method
        /*if (!$this->isValidMethod($this->request)){
            $this->abort(405);
        }*/

        # 404 : Route Invalid
        if (is_null($this->current_route)){
            $this->abort(404);
        }

        $action = $this->current_route['action'];

        # action => null
        if (is_null($action)){
            $this->abort(404);
        }


        # action => closure
        if (is_callable($action)){
            $action();
        }

        # action => 'controller::class@index'
        if (is_string($action)){
            $action = explode('@',$action);
        }

        # action => [controller::class,'index']
        if (is_array($action)){
            [$className,$method] = $action;
            $class = self::CONTROLLERS_PATH.$className;
            if(!class_exists($class)){
                throw new \Exception("Class $class Not Found!!!");
            }

            if (!method_exists($class,$method)){
                throw new \Exception("Method $method Not Found in class $class!");
            }

            $controller = new $class();

            $controller->$method();
        }

    }

    private function isValidMethod(Request $request) :bool
    {
       return true;
    }

    private function abort(int $int): void
    {
        view("errors.$int");
        http_response_code($int);
        die();
    }
}