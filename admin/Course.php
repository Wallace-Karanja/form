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
            exit;
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
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->post);
            if ($stmt->rowCount() == 1) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll($orderBy = "id")
    {
        try {
            $sql = "SELECT * FROM $this->table ORDER BY $orderBy";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAllById()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $_GET["updateId"]]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectColumnsById()
    {
        try {
            $sql = "SELECT $this->fields FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $_GET["id"]]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectColumn($id)
    {
        try {
            $sql = "SELECT $this->fields FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $id]);
            return $stmt->fetchColumn();
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
            $sql = null;
            if (count(explode(" ", $this->parameters)) > 1) {
                $sql = "UPDATE $this->table SET course = :course, department_id = :department_id, level_id = :level_id, exam_body_id = :exam_body_id,  duration_id = :duration_id,  requirement = :requirement, description = :description WHERE id = :id";
            } else {
                $sql = "UPDATE $this->table SET $this->fields = :$this->fields WHERE id = :id";
            }
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

    public function searchCourse()
    {
        try {
            unset($_GET["submit"]);
            $sql = "SELECT * FROM $this->table WHERE course LIKE :course AND department LIKE :department";
            $stmt = $this->connection->prepare($sql);
            $course = "%" . $_GET['course'] . "%";
            $department = "%" . $_GET['department'] . "%";
            $stmt->execute(["course" => $course, "department" => $department]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
