<?php
class Form
{
    public $connection;
    public $post;
    public $queryStatus;

    // db connection
    // check if the fields are okay, incase client side refuses to work
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") { // what would be a solution for very many fields?
            $this->post = $_POST;
        }
        $this->connection = $this->createDbConnection();
    }

    public function createDbConnection()
    {
        $dsn = "mysql:host=localhost;port=3307;dbname=form";
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
            // $sql = "INSERT INTO application_form (firstname, lastname, email_address, phone_number) VALUES ('" . $this->firstname . "','" . $this->lastname . "','" . $this->emailAddress . "','" . $this->phoneNumber . "')";
            $sql = "INSERT INTO application_form (firstname, lastname, email_address, phone_number) VALUES (:firstname, :lastname, :email_address, :phone_number)";
            $stmt = $this->connection->prepare($sql);
            $result = $stmt->execute($this->post);
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
        $sql = "SELECT COUNT(*) FROM application_form WHERE email_address = :email_address OR phone_number = :phone_number";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['email_address' => $this->post['email_address'], 'phone_number' => $this->post['phone_number']]);
        $count = $stmt->fetchColumn();
        return $count >= 1 ? true : false;
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM application_form";
        $result = $this->connection->query($sql);
        $records = $result->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    function selectById()
    {
        $sql = "SELECT * FROM application_form WHERE id = :id"; # named parameters
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute($_GET)) {
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $record;
        } else {
            return null;
        }
    }
}
