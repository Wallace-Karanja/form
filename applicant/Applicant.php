<?php
class Applicant
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
        foreach ($array as $key => $value) {
            // skip second_name and id number
            if ($key === "second_name" || $key === "email_address" || $key === "id_number") {
                continue;
            }
            if (empty(trim($value))) { // check if other fields are empty
                $this->fieldsOkay = false;
                return $this->fieldsOkay;
            }
        }
        $this->fieldsOkay = true;
        return $this->fieldsOkay;
    }



    private function checkPasswordLength(): bool
    {
        return strlen(trim($this->post['password'])) >= 8; // returns true if len >= 8
    }

    private function confirmPassword(): bool
    {
        return trim($this->post['password']) == trim($this->post['confirm_password']);
    }

    private function hashPassword(): string
    {
        return password_hash(trim($this->post['password']), CRYPT_BLOWFISH);
    }

    private function startSession(): void
    {
        session_start();
        $_SESSION['id'] = $this->post['phone_number'];
    }

    public function registerApplicant(): bool
    {
        if ($this->fieldsOkay) {
            if (!$this->applicantExists()) {
                if ($this->confirmPassword()) {
                    if ($this->checkPasswordLength()) {
                        $this->post['password'] = $this->hashPassword();
                        unset($this->post['confirm_password']);
                        unset($this->post['submit']);
                        try {
                            $sql = "INSERT INTO applicant_register (firstname, lastname, second_name, email_address, phone_number, id_number, password) VALUES (:firstname, :lastname, :second_name, :email_address, :phone_number, :id_number, :password)";
                            $stmt = $this->connection->prepare($sql);
                            $result = $stmt->execute($this->post);
                            if ($result != false) {
                                //SUCCESS
                                // $this->createLog(); // log to be created during login 
                                $this->queryStatus = 0;
                                return true;
                            } else {
                                // SOMETHING WENT WRONG
                                $this->queryStatus = 1;
                                return false;
                            }
                        } catch (Exception $e) {
                            echo $e->getMessage();
                            return false;
                        }
                    } else {
                        $this->queryStatus = 2; //pass length
                        return false;
                    }
                } else {
                    $this->queryStatus = 3; // pass dont match
                    return false;
                }
            } else {
                $this->queryStatus = 4; // user alreasy exists
                return false;
            }
        } else {
            $this->queryStatus = 5; // fields not okay
            return false;
        }
    }

    public function loginApplicant(): bool
    {
        if ($this->applicantExists()) {
            if ($this->verifyPassword()) {
                $this->queryStatus = 0; // success
                $this->startSession();
                $this->createLog();
                return true;
            } else {
                $this->queryStatus = 1;  // wrong password
                return false;
            }
        } else {
            $this->queryStatus = 2; // user does not exist
            return false;
        }
    }

    public function resetPassword(): bool
    {
        if ($this->fieldsOkay) {
            if ($this->applicantExists()) {
                if ($this->confirmPassword()) {
                    if ($this->checkPasswordLength()) {
                        $this->post['password'] = $this->hashPassword();
                        unset($this->post['confirm_password']);
                        unset($this->post['submit']);
                        try {
                            $sql = "UPDATE applicant_register SET password = :password WHERE phone_number = :phone_number OR email_address = :email_address";
                            $stmt = $this->connection->prepare($sql);
                            $result = $stmt->execute($this->post);
                            if ($result != false) {
                                // success
                                $this->queryStatus = 0;
                                return true;
                            } else {
                                $this->queryStatus = 1;
                                return false;
                            }
                        } catch (Exception $e) {
                            echo $e->getMessage();
                            return false;
                        }
                    } else {
                        // password less than 8
                        $this->queryStatus = 2;
                        return false;
                    }
                } else {
                    // pass does not match
                    $this->queryStatus = 3;
                    return false;
                }
            } else {
                // user does not exist
                $this->queryStatus = 4;
                return false;
            }
        } else {
            // field are not okay
            $this->queryStatus = 5;
            return false;
        }
    }

    private function verifyPassword(): bool
    {
        try {
            $sql = "SELECT password FROM applicant_register WHERE phone_number = :phone_number ";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['phone_number' => $this->post['phone_number']]);
            $hash = $stmt->fetchColumn();
            return  password_verify(trim($this->post['password']), $hash);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    private function applicantExists(): bool
    {
        $sql = "SELECT COUNT(*) FROM applicant_register WHERE phone_number = :phone_number";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['phone_number' => $this->post['phone_number']]);
        $count = $stmt->fetchColumn();
        return $count >= 1 ? true : false;
    }

    public function selectAll(): array
    {
        $sql = "SELECT * FROM applicant_register";
        $result = $this->connection->query($sql);
        $records = $result->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function selectById(): array
    {
        $sql = "SELECT * FROM applicant_register WHERE id = :id"; # named parameters
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute($_GET)) {
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $record;
        } else {
            return null;
        }
    }

    public function selectApplicantByPhoneNumber($phoneNumber): array
    {
        $sql = "SELECT * FROM applicant_register WHERE phone_number = :phone_number"; # named parameters
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->execute(["phone_number" => $phoneNumber]); // call the method after session is set
        if ($result) {
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $record;
        } else {
            return null;
        }
    }

    public function showLogs(): array // show logs to be shown on the admins side
    {
        try {
            $logFile = '../applicant/logs.json'; // path adjusted when method is called on applicantLogs.php
            $jsonLogs = file_get_contents($logFile);
            $records = json_decode($jsonLogs);
            return $records;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    public function createLog(): void
    {
        // create a log containing the id, actor, date and time to a json file
        $logFile = "./logs.json"; // log file
        $date = date("d-m-Y");
        $time = date("H:i:s");
        $log = ["actor" => "applicant", "id" => $this->post['phone_number'], "date" => $date, "time" => $time]; // json structure
        $logs = file_exists($logFile) ? json_decode(file_get_contents($logFile), true) : array();
        $logs[] = $log;
        $jsonLogs = json_encode($logs, JSON_PRETTY_PRINT);
        file_put_contents($logFile, $jsonLogs);
    }
}
