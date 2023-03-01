<?php

namespace Sifa\App\Controllers;

use Sifa\App\Core\Request;

class HomeController
{
    public function index()
    {
        echo "Hello From Controller";
    }

    public function routeParamater()
    {
      echo 'Hello From routeParamatter';
     global $request ;

      var_dump($request->get_route_params());
      var_dump($request->get_route_param('slug'));
    }
}