<?php
session_start();
include './Applicant.php';
include '../admin/Course.php';
if (!isset($_SESSION['id'])) {
    $url = './login.php';
    header("Location:" . $url);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/styles.css">
    <!-- <script src="script.js" defer></script> -->
    <title>Form</title>
</head>

<body>
    <div class="header-container">
        <div></div>
        <div></div>
        <div>
            <nav>
                <ul class="nav-container">
                    <div class="links">
                        <li><a href="index.php">Home</a></li>
                    </div>
                    <div>
                        <li class="links"><a href="courses.php">Courses</a></li>
                    </div>
                    <div>
                        <li class="links"><a href="logout.php">Logout</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div>
            <nav>
                <ul>
                    <li><a href="application.php">Personal Information</a></li>
                    <li><a href="academics.php">Academic Information</a></li>
                    <li><a href="course.php">Select Course</a></li>
                    <li><a href="demographics.php">Demographic Information</a></li>
                    <li><a href="demographics.php">Parent/Guardian Information</a></li>
                    <li><a href="upload.php">Upload Documents</a></li>
                </ul>
            </nav>
        </div>
        <main>
            <h1>Application</h1>
            <h2>Apply for a course</h2>
            <?php
            // echo (isset($_GET["id"]) ? $_GET["id"] : "not set");
            if (isset($_GET["id"])) {
                // $id = $_GET["id"];
                $course = new Course("courses_view", "*");
                var_dump($course->selectColumnsById());
            }
            ?>
            <div>

            </div>
        </main>
        <div></div>
    </div>

</body>

</html>