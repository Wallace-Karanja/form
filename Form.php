<?php
class Form
{
    public $firstname;
    public $lastname;
    public $emailAddress;
    public $phoneNumber;
    public $connection;
    public $queryStatus;
    // public  $post = $_POST; 

    // db connection

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") { // what would be a solution for very many fields?
            $this->firstname = $_POST['firstname'];
            $this->lastname = $_POST['lastname'];
            $this->emailAddress = $_POST['email_address'];
            $this->phoneNumber = $_POST['phone_number'];
        }
        $this->connection = $this->createDbConnection();
    }

    public function createDbConnection()
    {
        $dsn = "mysql:host=localhost;dbname=form";
        $username = "admin";
        $password = "admin2024";
        try {
            $pdo = new PDO($dsn, $username, $password);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert()
    {
        if ($this->checkIfUserExists() == false) {
            $sql = "INSERT INTO application_form (firstname, lastname, email_address, phone_number) VALUES ('" . $this->firstname . "','" . $this->lastname . "','" . $this->emailAddress . "','" . $this->phoneNumber . "')";

            $result = $this->connection->query($sql);
            if ($result != false) {
                //SUCCESS
                $this->queryStatus = 0;
            } else {
                // SOMETHING WENT WRONG
                $this->queryStatus = 1;
            }
        } else {
            // USER ALREADY EXISTS
            $this->queryStatus = 2;
        }
    }

    public function checkIfUserExists()
    {
        $sql = "SELECT COUNT(*) FROM application_form WHERE email_address = '" . $this->emailAddress . "' OR phone_number = '" . $this->phoneNumber . "'";
        $result = $this->connection->query($sql);
        $count = $result->fetchColumn();
        return $count >= 1 ? true : false;
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM application_form";
        $result = $this->connection->query($sql);
        $records = $result->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
}
