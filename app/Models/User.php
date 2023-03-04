<?php

namespace Sifa\App\Models;

use Sifa\App\Models\Contracts\JsonModel;

class User extends JsonModel
{
    protected string $table = 'users';
}