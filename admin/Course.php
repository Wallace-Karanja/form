<?php
class Course
{
    private $connection;
    public $post;
    public $queryStatus;
    private $fieldsOkay;


    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->post = $_POST;
            $this->checkFields($this->post);
        }
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

    private function checkFields($array): bool
    {
        foreach ($array as $value) {
            if (empty(trim($value))) {
                $this->fieldsOkay = false;
                return false;
            }
        }
        $this->fieldsOkay = true;
        return true;
    }

    public function createDepartment()
    {
        try {
            unset($this->post['submit']);
            $sql = "INSERT INTO departments (department) VALUES (:department)";
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

    public function selectDepartments()
    {
        try {
            $sql = "SELECT * FROM departments";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectDepartmentById()
    {
        try {
            $sql = "SELECT department FROM departments WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["id" => $_GET['updateId']]);
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateDepartment()
    {
        try {
            unset($this->post['submit']);
            $sql = "UPDATE departments SET department = :department WHERE id = :id";
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

    public function deleteDepartment()
    {
        try {
            $sql = "DELETE FROM departments WHERE id = :id";
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
}
