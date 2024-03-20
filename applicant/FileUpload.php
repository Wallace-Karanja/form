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

    public $maxFileSize = 2 * 1023 * 1023;
    public $uploadDir = "./uploads/";
    // public $connection;

    public function __construct($fileKey)
    {
        $this->file = $_FILES;
        $this->fileKey = $fileKey;
        $this->fileTmpName =  $this->file[$this->fileKey]['tmp_name'];
        $this->fileName =  $this->file[$this->fileKey]['name'];
        $this->fileSize =  $this->file[$this->fileKey]['size'];
        $this->fileExtension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        $this->connection = parent::createDbConnection();
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
                        if ($this->upload()) {
                            // upload success
                            $this->createUploadRecord();
                            $this->uploadStatus = 0;
                            return true;
                        } else {
                            // upload fail
                            $this->uploadStatus = 1;
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

    // database to 
    public function createUploadRecord()
    {
        try {
            $sql = "INSERT INTO applicant_documents (applicant_id, birth_certificate) VALUES (:applicant_id, :birth_certificate)";
            $stmt = $this->connection->prepare($sql);
            $results = $stmt->execute(["applicant_id" => $this->applicantId, "birth_certificate" => $this->fileName]);
            if ($results != false) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
