<?php

namespace Sifa\App\Models;

use Sifa\App\Models\Contracts\JsonModel;
use Sifa\App\Models\Contracts\MySqlModel;

class User extends MySqlModel
{
    protected string $table = 'users';
}