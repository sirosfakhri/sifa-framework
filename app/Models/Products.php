<?php

namespace Sifa\App\Models;

use Sifa\App\Models\Contracts\JsonModel;

class Products extends JsonModel
{
    protected string $table = 'products';
}