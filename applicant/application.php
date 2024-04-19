<?php
class Application extends Applicant
{
    // personal information
    // demographic information
    // academic information
    // course information
    // guardian information

    // create -- action for applicant
    // read -- action for applicant
    // update -- action for applicant

    // get the applicant id => from register db 
    // check if applicant id exists in the table => table can be any table 
    // create if the applicant id does not exist, else update information

    public $table;
    public $post;
    public $applicantId;
    public $updateString;

    public $connection;
    public function __construct($table = null, $post = null, $applicantId = null, $columns = null, $parameters = null, $updateString = null)
    {
        $this->table = $table;
        $this->post = $post;
        $this->applicantId = $applicantId;
        $this->columns = $columns;
        $this->parameters = $parameters;
        $this->updateString = $updateString;
        $this->connection = parent::createDbConnection();
    }

    public function createInformation()
    {
        try {
            unset($this->post['submit']);
            $sql = "INSERT INTO $this->table ($this->columns) VALUES ($this->parameters)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->post);
            return $stmt->rowCount() == 1 ? true : false;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateInformation(): bool
    {
        try {
            unset($this->post['submit']);
            $sql = "UPDATE $this->table SET $this->updateString WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->post);
            return $stmt->rowCount() == 1 ? true : false;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function saveInformation()
    {
        if ($this->recordExists()) {
            return $this->updateInformation();
        } else {
            return $this->createInformation();
        }
    }
    public function recordExists(): bool
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->rowCount() == 1 ? true : false;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findInformationByApplicantId()
    {
        if ($this->recordExists()) {
            try {
                $sql = "SELECT * FROM $this->table WHERE applicant_id = :applicant_id";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute(['applicant_id' => $this->applicantId]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return false;
    }

    public function findColumnById($id)
    {
        try {
            $sql = "SELECT $this->columns FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
