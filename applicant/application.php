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

    public function insertNewSubCounty()
    {
        try {
            $sql = "INSERT INTO sub_counties (county_id, sub_county) VALUES (:county_id, :sub_county)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['county_id' => $this->post['county_id'], 'sub_county' => $this->post['other_sub_county']]);
            return $this->connection->lastInsertId(); //get the last id to be inserted
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function selectAllApplications()
    {
        try {
            $sql = "SELECT * FROM applications";
            $stmt = $this->connection->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectApplicationById()
    {
        try {
            $sql = "SELECT * FROM applications WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($_GET);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectApplicationByApplicantId()
    {
        try {
            $sql = "SELECT * FROM applications WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function submitApplication()
    {
        $sql = null;

        if ($this->submitRecordExist()) {
            $sql = "UPDATE submitted_applications SET submitted = :submit WHERE applicant_id = :applicant_id";
        } else {
            $sql = "INSERT INTO submitted_applications (applicant_id, submitted) VALUES (:applicant_id, :submit)";
        }
        try {
            $this->post['submit'] = 1;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->post);
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function submitRecordExist()
    {
        try {
            $sql = "SELECT id FROM submitted_applications WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->rowCount() >= 1;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function retractApplication()
    {
        try {
            $sql = "UPDATE submitted_applications SET submitted = :retract WHERE applicant_id = :applicant_id";
            $this->post['retract'] = 0;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->post);
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function applicationIsSubmitted()
    {
        try {
            $sql = "SELECT submitted FROM submitted_applications WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->fetchColumn() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // admit and decline application for admin
    public function admitApplicant()
    {
        $sql = null;
        if ($this->applicationDecisionExist()) {
            $sql = "UPDATE applications_decision SET admitted = :admit WHERE applicant_id = :applicant_id";
        } else {
            $sql = "INSERT INTO applications_decision (applicant_id, admitted) VALUES (:applicant_id, :admit)";
        }

        try {
            $stmt = $this->connection->prepare($sql);
            $this->post['admit'] = 1;
            $stmt->execute($this->post);
            $this->saveAdmissionNumber();
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function generateAdmissionNumber()
    {
        $departmentCode = $this->getDepartmentCode();
        $courseCode = $this->getCourseCode();
        if (!is_null($departmentCode) && !is_null($courseCode)) {
            $admissionNumber = $departmentCode . "/" . $courseCode . "/" . $this->applicantId . "/" . date('Y');
            return $admissionNumber;
        }
        return null;
    }

    public function saveAdmissionNumber()
    {
        $admissionNumber = $this->generateAdmissionNumber();
        if (!$this->admissionNumberAssigned()) {
            if ($admissionNumber != null) {
                $sql = null;
                if ($this->admissionNumberRecordExist()) {
                    $sql = "UPDATE admission_numbers SET admission_number = :admission_number WHERE applicant_id = :applicant_id ";
                } else {
                    $sql = "INSERT INTO admission_numbers (applicant_id, admission_number) VALUES (:applicant_id, :admission_number)";
                }

                try {
                    $stmt = $this->connection->prepare($sql);
                    $stmt->execute(['applicant_id' => $this->applicantId, 'admission_number' => $admissionNumber]);
                    return $stmt->rowCount() == 1;
                } catch (Exception $e) {
                    echo $e->getMessage();
                    return false;
                }
            } else {
                echo "admission number is null";
            }
        } else {
            echo "admission number already assigned";
        }
    }

    // 

    public function revokeAdmissionNumber()
    {
        if ($this->admissionNumberAssigned()) {
            try {
                $sql = "UPDATE admission_numbers SET admission_number = :admission_number WHERE applicant_id = :applicant_id";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute(['admission_number' => '', 'applicant_id' => $this->applicantId]);
                return $stmt->rowCount() == 1;
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }

    public function admissionNumberAssigned()
    {
        try {
            $sql = "SELECT admission_number FROM admission_numbers WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            $admissionNumber = $stmt->fetchColumn();
            return $admissionNumber != null;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function admissionNumberRecordExist()
    {
        try {
            $sql = "SELECT * FROM admission_numbers WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function getDepartmentCode()
    {
        try {
            $sql = "SELECT abbr FROM departments WHERE id = (SELECT department_id FROM applications WHERE applicant_id = :applicant_id)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }

    }

    public function getCourseCode()
    {
        try {
            $sql = "SELECT abbr FROM courses WHERE id = (SELECT course_id FROM applications WHERE applicant_id = :applicant_id)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }

    }


    public function declineApplicant()
    {
        $sql = null;
        if ($this->applicationDecisionExist()) {
            $sql = "UPDATE applications_decision SET admitted = :decline WHERE applicant_id = :applicant_id";
        } else {
            $sql = "INSERT INTO applications_decision (applicant_id, admitted) VALUES (:applicant_id, :decline)";
        }
        try {
            if ($this->admissionNumberAssigned()) { // if was already assigned
                $this->revokeAdmissionNumber();
            }
            $stmt = $this->connection->prepare($sql);
            $this->post['decline'] = 0;
            $stmt->execute($this->post);

            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function applicationDecisionExist()
    {
        try {
            $sql = "SELECT * FROM applications_decision WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectSubmittedApplicationByApplicantId()
    {
        try {
            $sql = "SELECT * FROM submitted_applications WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }

    }

    public function setAdmissionOfferDecision()
    {
        try {
            $sql = null;
            if ($this->admissionOfferDecisionExist()) {
                $sql = "UPDATE admission_offers SET applicant_decision = :applicant_decision WHERE application_id = :application_id AND applicant_id = :applicant_id";
            } else {
                $sql = "INSERT INTO admission_offers (application_id, applicant_id, applicant_decision) VALUES ( :application_id, :applicant_id, :applicant_decision)";
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->post);
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function getAdmissionOfferDecision()
    {
        if ($this->admissionOfferDecisionExist()) {
            try {
                $sql = "SELECT applicant_decision FROM admission_offers WHERE applicant_id = :applicant_id";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute(['applicant_id' => $this->applicantId]);
                return $stmt->fetchColumn();
            } catch (Exception $e) {
                echo $e->getMessage();
                return null;
            }
        }
        return null;

    }

    public function admissionOfferDecisionExist()
    {
        try {
            $sql = "SELECT * FROM admission_offers WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['applicant_id' => $this->applicantId]);
            return $stmt->rowCount() == 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
