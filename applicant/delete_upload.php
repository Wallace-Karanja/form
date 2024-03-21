<?php
session_start();
include './Applicant.php';
include './FileUpload.php';
$name = $_GET['filename'];

if (isset($name)) {
    $uploaded = new FileUpload($name);
    $uploaded->delete();
    $deleteStatus = $uploaded->deleteStatus;
    switch ($deleteStatus) {
        case  0:
            echo "File deleted Successfully";
            // $url = './upload.php';
            // header("refresh:3;" . $url);
            echo $_GET['filename'];
            break;
        case  1:
            echo "File delete failed";
            break;
        default:
            echo "Error";
            echo $deleteStatus;
            break;
    }
}
