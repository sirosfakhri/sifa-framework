<?php

namespace Sifa\App\Models\Contracts;

abstract class Model implements CRUD
{
    protected string $connection;

    protected string $table;

    protected string $primaryKey = 'id';

    protected int $pageSize = 10;

    protected array $attribute = [];

    protected function getAttribute($key){
        if (!$key || !array_key_exists($key, $this->attribute))
            return null;

        return $this->attribute[$key];
    }

}