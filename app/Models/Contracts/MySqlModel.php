<?php

namespace Sifa\App\Models\Contracts;

use PDO;

class MySqlModel extends Model
{
    public function __construct()
    {
        try {
            $this->connection = new PDO("{$_ENV['DB_CONNECTION']}:dbname={$_ENV['DB_DATABASE']};host={$_ENV['DB_HOST']}",$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
            $this->connection->exec('set names utf8;');

        }catch (\Exception $exception){
            var_dump($exception->getCode(),$exception->getMessage());
        }

    }

    public function create(array $data): int
    {
        return 1;
    }

    public function find(int $id): object
    {
       return (object)[];
    }

    public function get(array $columns, array $where): array
    {
        return [];
    }

    public function update(array $data, array $where): int
    {
        return 1;
    }

    public function delete(array $where): int
    {
        return 1;
    }
}