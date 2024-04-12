<?php
session_start();
include './Applicant.php';
include './includes/helper_funcs.php';
if (!isset($_SESSION['id'])) {
    $url = './login.php';
    header("Location:" . $url);
}
// generate applicant information
$applicantInformation = new Applicant();

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
            <h2>Demographic Information</h2>
            <div>
                <?php
                $record = $applicantInformation->selectApplicantByPhoneNumber($_SESSION['id']);
                $row = $record[0];
                $applicantId = $row['id'];
                echo "applicant id = " . $applicantId;
                ?>
                <form action="" method="post" id="form">
                    <div>
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="">Kenya</option>
                            <option value="">Unganda</option>
                        </select>
                    </div>
                    <div>
                        <label for="county">County</label>
                        <select name="county" id="county">
                            <option value="">Mombasa</option>
                            <option value="">Kwale</option>
                        </select>
                    </div>
                    <div>
                        <label for="sub_county">Sub County</label>
                        <select name="sub_county" id="sub_county">
                            <option value="">Mombasa</option>
                            <option value="">Kwale</option>
                        </select>
                    </div>
                    <div>
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" required>
                    </div>
                    <div>
                        <label for="sub_location">Sub-Location</label>
                        <input type="text" name="sub_location" id="sub_location" required>
                    </div>
                    <div>
                        <label for="village">Village</label>
                        <input type="text" name="village" id="village" required>
                    </div>
                </form>
                <p id="message"></p>

            </div>
        </main>
        <div></div>
    </div>

</body>

</html>