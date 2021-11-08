<?php

class Connection
{
    private mysqli $conn;

    private Discount $discount;


    public function __construct($hostname, $username, $password, $database)
    {
        $this->conn = new mysqli($hostname, $username, $password, $database);
    }

    public function testConnection (): void
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getData(int $id, string $table, array $arrElem, $class)
    {
        $methods = get_class_methods($class);

        $string = '';

        foreach($arrElem as $key => $elem) {
            if ($key == count($arrElem) - 1) {
                $string .= $elem;
            } else {
                $string .= $elem . ",";
            }
        }

        $columns = $this->conn->query("SELECT $string FROM $table WHERE id = $id");
        $row = $columns->fetch_assoc();

        foreach ($methods as $key => $value) {
            if ($key < count($arrElem)) {
                $class -> $value($row["$arrElem[$key]"]);
            }
        }

        return $class;
    }

    public function getColLength ($table): string {
        $result = $this->conn->query("SELECT COUNT(*) FROM $table ");
        $colLength = $result->fetch_assoc();
        return $colLength["COUNT(*)"];
    }
}