<?php

namespace Sifa\App\Middlewares;

use Sifa\App\Core\Request;
use Sifa\App\Middlewares\Contracts\MiddlewareInterface;

class BlockFireFox implements MiddlewareInterface
{
    public function handle(Request $request)
    {
        var_dump($request->uri());
        var_dump('BlockFireFox');
    }
}