<?php
class Course
{
    private $connection;
    public $post;
    public $queryStatus;
    private $fieldssOkay;
    public $table;
    public $fields;
    public $parameters;


    public function __construct($table, $column = null, $parameters = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->post = $_POST;
            $this->fieldssOkay = $this->checkfieldss($this->post);
        }
        $this->table = $table;
        $this->fields = $column;
        $this->parameters = $parameters;
        $this->connection = $this->createDbConnection();
    }

    private function createDbConnection(): object
    {
        require_once './includes/config.php';
        $DSN = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . "";
        $USERNAME = USER;
        $PASSWORD = PASSWORD;
        try {
            $PDO = new PDO($DSN, $USERNAME, $PASSWORD);
            return $PDO;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function checkfieldss($array): bool
    {
        foreach ($array as $value) {
            if (empty(trim($value))) {
                return false;
            }
        }
        $this->fieldssOkay = true;
        return true;
    }

    public function delete()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $result = $stmt->execute(["id" => $_GET["deleteId"]]);
            if ($stmt->rowCount() == 1) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function create()
    {
        try {
            unset($this->post['submit']);
            $sql = "INSERT INTO $this->table ($this->fields) VALUES ($this->parameters)";
            echo $sql;
            $stmt = $this->connection->prepare($sql);
            // echo $sql;
            $result = $stmt->execute($this->post);
            if ($stmt->rowCount() == 1) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll()
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectById()
    {
        try {
            $sql = "SELECT $this->fields FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $_GET['updateId']]);
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update()
    {
        try {
            unset($this->post['submit']);
            $sql = "UPDATE $this->table SET $this->fields = :$this->fields WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $result = $stmt->execute($this->post);
            if ($stmt->rowCount() == 1) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
