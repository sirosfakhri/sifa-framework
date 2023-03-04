<?php

namespace Sifa\App\Models\Contracts;

class JsonModel extends Model
{
    private string $db_base_path;

    public function __construct()
    {
        $this->db_base_path = base_path().DIRECTORY_SEPARATOR.'databases'.DIRECTORY_SEPARATOR.'Json'.DIRECTORY_SEPARATOR. $this->table .'.json';
    }

    public function create(array $data): int
    {
        $table_data = $this->read_table();
        $table_data[] = $data;
        $this->write_table($table_data);
        return $data[$this->primaryKey];
    }

    private function read_table(): array
    {
        return json_decode(file_get_contents($this->db_base_path));
    }

    private function write_table(array $data) : void
    {
        file_put_contents($this->db_base_path,json_encode($data));
    }

    public function find(int $id): object
    {
        $data = $this->read_table();

        foreach ($data as $row){
            if ($row->{$this->primaryKey} == $id)
                return $row;
        }

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