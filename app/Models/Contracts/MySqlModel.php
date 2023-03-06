<?php

namespace Sifa\App\Models\Contracts;

use PDO;
use Medoo\Medoo;

class MySqlModel extends Model
{
    public function __construct()
    {
        try {
            $this->connection = new Medoo([
                // [required]
                'type' => env('DB_CONNECTION'),
                'host' => env('DB_HOST'),
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),

                // [optional]
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'port' => env('DB_PORT'),

                // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
                'prefix' => '',

                // [optional] To enable logging. It is disabled by default for better performance.
                'logging' => true,

                // [optional]
                // Error mode
                // Error handling strategies when the error has occurred.
                // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
                // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
                'error' => env('MODE') === 'develop' ? PDO::ERRMODE_EXCEPTION : PDO::ERRMODE_SILENT,

                // [optional]
                // The driver_option for connection.
                // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
                'option' => [
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ],

                // [optional] Medoo will execute those commands after the database is connected.
                'command' => [
                    'SET SQL_MODE=ANSI_QUOTES'
                ]
            ]);

        }catch (\Exception $exception){
            var_dump('MySQL Connection is Failed. ' . $exception->getCode(),$exception->getMessage());
        }

    }

    public function create(array $data): int
    {
        $this->connection->insert($this->table, $data);
        return $this->connection->id();
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