<?php
class FileUpload extends Applicant // inherits from Applicant
{
    // $file_tmp_name = $_FILES['birth_certificate']['tmp_name'];
    // $file_name = $_FILES['birth_certificate']['name'];
    // $fileSize = $_FILES['birth_certificate']['size'];
    // $maxFileSize = 2 * 1024 * 1024;
    // $uploadDir = "./uploads/";
    // $fileExtension = pathinfo($file_name, PATHINFO_EXTENSION);
    // $_FILES['birth_certificate']['name'] = $applicantName . "_birth_certificate" . "." . $fileExtension; // change file name
    // $file_name = $_FILES['birth_certificate']['name'];
    // $destination = $uploadDir . $file_name;

    public $file;
    public $fileKey;
    public $fileTmpName;
    public $fileName;
    public $fileSize;
    public $fileExtension;
    public $applicantName;
    public $applicantId;
    public $destination;
    public $uploadStatus;
    public $deleteStatus;
    public $uploadRecord;

    public $maxFileSize = 2 * 1023 * 1023;
    public $uploadDir = "./uploads/";


    public function __construct($fileKey)
    {
        $this->fileKey = $fileKey;
        if (isset($_FILES[$fileKey])) {
            $this->file = $_FILES[$fileKey];
            $this->fileTmpName =  $this->file['tmp_name'];
            $this->fileName =  $this->file['name'];
            $this->fileSize =  $this->file['size'];
            $this->fileExtension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        }
        $this->connection = parent::createDbConnection();
        $this->setApplicantName();
        $this->uploadRecordExists();
    }

    // check file size
    // set applicant name,
    // change the file name
    // set file destination
    // move the file

    public function fileSizeOkay()
    {
        return $this->fileSize <= $this->maxFileSize;
    }

    public function setApplicantName()
    {
        $applicant = $this->selectApplicantByPhoneNumber($_SESSION['id'])[0]; // get the first record
        $this->applicantId = $applicant['id'];
        $this->applicantName = $applicant['lastname'] . "_" . $applicant['firstname'];
        return $this->applicantName;
    }

    public function changeFileName()
    {
        return $this->fileName = $this->applicantName . "_" . $this->fileKey . "." . $this->fileExtension;
    }

    public function setDestination()
    {
        $this->destination = $this->uploadDir . $this->fileName;
        return $this->destination;
    }

    public function upload()
    {
        return move_uploaded_file($this->fileTmpName, $this->destination);
    }

    public function uploadFile()
    {
        if ($this->fileSizeOkay()) {
            //file size okay
            if (!empty($this->setApplicantName())) {
                // applicant name is set
                if (!empty($this->changeFileName())) {
                    // file name has been changed
                    if (!empty($this->setDestination())) {
                        // destination is set
                        // ==> check whether the record exists
                        if (!$this->uploadRecordExists()) {
                            // upload record does not record exists
                            if ($this->upload() && $this->createUploadRecord()) {
                                $this->uploadStatus = 0;
                                return true;
                            } else {
                                // upload fail
                                $this->uploadStatus = 1;
                                return false;
                            }
                        } else {
                            // upload record already exists
                            $this->uploadStatus = 6;
                            return false;
                        }
                    } else {
                        // problem setting destination
                        $this->uploadStatus = 2;
                        return false;
                    }
                } else {
                    // problem changing the file name
                    $this->uploadStatus = 3;
                    return false;
                }
            } else {
                // applicant name is not set
                $this->uploadStatus = 4;
                return false;
            }
        } else {
            // file size more than 2 MB
            $this->uploadStatus = 5;
            return false;
        }
    }

    public function deleteRecord()
    {
        try {
            $sql = "DELETE FROM applicant_documents WHERE " . "'" . $this->fileKey . "' = " . "'" . $this->uploadRecord . "'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $deleted = $stmt->rowCount();
            if ($deleted == 1) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function fileExists()
    {
        $file = "$this->uploadDir/$this->uploadRecord";
        return file_exists($file);
    }

    function deleteFile()
    {
        return unlink("$this->uploadDir/$this->uploadRecord");
    }



    public function delete()
    {
        if ($this->fileExists()) {
            if ($this->uploadRecordExists()) {
                // echo "ready to delete";
                if ($this->deleteRecord()) {
                    // echo "deleting record";
                    if ($this->deleteFile()) {
                        // success 
                        $this->deleteStatus = 0;
                        return true;
                    } else {
                        // unlink failed
                        $this->deleteStatus = 1;
                        return false;
                    }
                } else {
                    // deleting failed, deleting record db
                    $this->deleteStatus = 2;
                    return false;
                }
            } else {
                // deleting failed, record does not exist
                $this->deleteStatus = 3;
                return false;
            }
        } else {
            // deleting failed, file does not exist
            $this->deleteStatus = 4;
            return false;
        }
    }

    public function createUploadRecord()
    {
        try {
            $sql = "INSERT INTO applicant_documents (applicant_id, $this->fileKey) VALUES (:applicant_id, :$this->fileKey)";
            $stmt = $this->connection->prepare($sql);
            $results = $stmt->execute(["applicant_id" => $this->applicantId, $this->fileKey => $this->fileName]);
            if ($results != false) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            // SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '1' for key 'applicant_documents.PRIMARY'
            return false;
        }
    }

    public function uploadRecordExists()
    {
        try {
            $sql = "SELECT $this->fileKey FROM applicant_documents WHERE applicant_id = :applicant_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(["applicant_id" => $this->applicantId]);
            $this->uploadRecord = $stmt->fetchColumn(); // capture the upload record (from db)
            return !empty($this->uploadRecord);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
