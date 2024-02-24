<?php

declare(strict_types=1);

namespace Core\Database;

abstract class QueryBuilder
{
    protected $table;
    private $connection;
    private $query = '';
    private $data = array();

    public function __construct()
    {
        $database = new Database();

        $this->connection = $database->getConnection();
    }

    public function select(array $columns): self
    {
        $this->query = 'SELECT ' . implode(',', $columns) . ' FROM ' . $this->table;

        return $this;
    }

    public function where(string $column, string $operator, $value): self
    {
        $this->data[] = $value;

        $this->query .= ' WHERE ' . $column . ' ' . $operator . ' ?';
        return $this;
    }

    public function whereArray(string $column, string $operator, array $values): self
    {
        $ids = implode("','", $values);

        $this->query .= ' WHERE ' . $column . ' ' . $operator . ' (\''.$ids.'\')';

        return $this;
    }

    public function delete(string $column, array $data)
    {
        $this->query = 'DELETE FROM ' . $this->table;

        $this->whereArray($column, 'IN', $data);

        return $this->finish()->get_result();
    }

    public function insert(array $data)
    {
        $columns = implode(", ", array_keys($data));

        $data = array_map(array($this->connection, 'real_escape_string'), array_values($data));

        $this->data = array_merge($this->data, $data);

        $this->query = 'INSERT INTO ' . $this->table . ' (' . $columns . ') VALUES (' . implode(',', array_fill(0, count($data), '?')) . ')';

        return $this->finish();
    }

    private function getDataType($data): string
    {
        switch (gettype($data)) {
            case 'double':
                return 'd';
            case 'integer':
                return 'i';

            default:
                return 's';
        }
    }

    private function getTypes(): string
    {
        $types = '';

        foreach ($this->data as $key => $value) {
            $types .= $this->getDataType($value);
        }

        return $types;
    }

    private function finish()
    {
        $statement = $this->connection->prepare($this->query);

        if ($this->data != null) {
            $params = array();
            $params[] = $this->getTypes();
            $params = array_merge($params, $this->data);
            foreach ($params as $key => $value) $params[$key] = &$params[$key];

            call_user_func_array(array($statement, 'bind_param'), $params);
        }

        $this->data = array();

        $statement->execute();

        return $statement;
    }

    public function get(): array
    {
        return mysqli_fetch_all($this->finish()->get_result(), MYSQLI_ASSOC);
    }

    public function first()
    {
        return mysqli_fetch_object($this->finish()->get_result());
    }
}