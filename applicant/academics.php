<?php
ob_start();
session_start();
include './Applicant.php';
include './Application.php';
include './includes/helper_funcs.php';
if (!isset($_SESSION['id'])) {
    $url = './login.php';
    header("Location:" . $url);
}
// generate applicant information
$demographicInformation = new Applicant();
$registrationInformation = new Applicant();

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
                    <li><a href="personal.php">Personal Information</a></li>
                    <li><a href="demographics.php">Demographic Information</a></li>
                    <li><a href="academics.php">Academic Information</a></li>
                    <li><a href="course.php<?php echo (isset($_GET['courseId']) ? '?courseId=' . $_GET['courseId'] : '') ?>">Select Course</a></li>
                    <li><a href="demographics.php">Parent/Guardian Information</a></li>
                    <li><a href="upload.php">Upload Documents</a></li>
                </ul>
            </nav>
        </div>
        <main>
            <h1>Application</h1>
            <h2>Academic Information</h2>
            <div>
                <?php
                $record = $registrationInformation->selectApplicantByPhoneNumber($_SESSION['id'])[0];
                $id = $record['id'];

                $academicInformation = new Application("academic_information", null, $applicantId = $id, null, null, null);
                if ($academicInformation->findInformationByApplicantId()) {
                    $row = $academicInformation->findInformationByApplicantId()[0];
                }
                ?>
                <style>
                    #form {
                        margin: 20px;
                    }
                </style>
                <form action="" method="post" id="form">
                    <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                    <div><label for="primary_school_name">Primary School Name</label></div>
                    <div><input type="text" name="primary_school_name" value="" required></div>
                    <div><label for="index">KCPE index Number</label></div>
                    <div><input type="text" name="kcpe_index_number" id="index"></div>
                    <div><label for="kcpe_marks">Grade/Marks</label></div>
                    <div><input type="text" name="kcpe_marks" id="grade"></div>
                    <div><input type="submit" name="submit" value="submit" id="submit"></div>
                </form>

                <form action="" method="post" id="form">
                    <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                    <div><label for="primary">Secondary School Name</label></div>
                    <div><input type="text" name="primary" id="primary" required></div>
                    <div><label for="index">KCSE index Number</label></div>
                    <div><input type="text" name="index" id="index"></div>
                    <div><label for="grade">Grade</label></div>
                    <div><input type="text" name="grade" id="grade"></div>
                    <div><input type="submit" name="submit" value="submit" id="submit"></div>
                </form>

                <form action="" method="post" id="form">
                    <div><label for="tertiary">Name of Institute/Polytechnic/College</label></div>
                    <div><input type="text" name="tertiary" id="tertiary" required></div>
                    <div><label for="course">Course</label></div>
                    <div><input type="text" name="course" id="course"></div>
                    <div><label for="grade">Grade/Classification</label></div>
                    <div><input type="text" name="grade" id="grade"></div>
                    <div><input type="submit" name="submit" value="submit" id="submit"></div>
                </form>
                <p id="message"></p>
                <?php
                if (isset($_POST["submit"])) {
                    $columns = "applicant_id, county_id, sub_county_id, location, sub_location, village";
                    $parameters = ":applicant_id, :county_id, :sub_county_id, :location, :sub_location, :village";
                    $updateString = "applicant_id = :applicant_id, county_id = :county_id, sub_county_id = :sub_county_id, location = :location, sub_location = :sub_location, village = :village";
                    $application = new Application("demographic_information", $_POST, $id, $columns, $parameters, $updateString);
                    if ($application->saveInformation()) {
                        echo "Saved Successifully";
                        refresh($_SERVER['PHP_SELF'], 3);
                    } else {
                        echo "Saving failure/no changes made";
                    }
                }
                ?>
            </div>
        </main>
        <div></div>
    </div>
</body>

</html>
<?php ob_end_flush(); ?>