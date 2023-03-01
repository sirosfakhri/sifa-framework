<?php

namespace Sifa\App\Middlewares\Contracts;

use Sifa\App\Core\Request;

interface MiddlewareInterface
{
    public function handle(Request $request);
}