<?php

namespace Sifa\App\Models\Contracts;

interface CRUD
{
    public function create(array $data) : int;

    public function find(int $id) : object;

    public function get(array $columns, array $where) : array;

    public function update(array $data, array $where) : int;

    public function delete(array $where) : int;
}