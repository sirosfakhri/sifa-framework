<?php

namespace Sifa\App\Middlewares;

use Sifa\App\Core\Request;
use Sifa\App\Middlewares\Contracts\MiddlewareInterface;

class BlockIE implements MiddlewareInterface
{
    public function handle(Request $request)
    {
        var_dump('BlockIE');
    }
}