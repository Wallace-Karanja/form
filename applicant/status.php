<?php
ob_start();
session_start();
include 'Applicant.php';
include 'Application.php';
include './includes/helper_funcs.php';
if (!isset($_SESSION['id']) && $_SESSION['id'] !== 29334778) {
    $url = './login.php';
    header("Location:" . $url);
}

$registrationInformation = new Applicant();
$record = $registrationInformation->selectApplicantByPhoneNumber($_SESSION['id'])[0];
$applicantId = $record['id'];
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
                            <li class="links"><a href="">About</a></li>
                        </div>
                        <div>
                            <li class="links"><a href="">Contact Us</a></li>
                        </div>
                        <div>
                            <li class="links"><a href="../admin/">Admin</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="container">
            <div>
                <?php include './includes/side_navigation.php'; ?>
            </div>
            <div>
                <main style="background-color: wheat; padding:5px; border: 1px solid black; border-radius: 5px;">
                    <h1>Application Status</h1>
                    <div>
                        <?php
                        $application = new Application(null, null, $applicantId);
                        if ($application->applicationIsSubmitted()) {
                            if ($application->applicationDecisionExist()) {
                                if ($application->admissionNumberAssigned()) {
                                    $info = $application->selectApplicationByApplicantId()[0];
                                    $admissionNumber = $info['admission_number'];
                                    $application->table = "levels";
                                    $application->columns = "id";
                                    $level = $application->findAllById($info['level_id'])[0]['level'];

                                    $application->table = "departments";
                                    $application->columns = "id";
                                    $department = $application->findAllById($info['department_id'])[0]['department'];

                                    echo "<p>Congratulations, after careful review of your application, we are pleased to inform you that you have been admitted to the program <b>$info[course], $level</b>. In the department of <b>$department</b>. Your admission number is : <i>$admissionNumber</i>.</p>";
                                } else {
                                    echo "<p>We regret to inform you that your application was not considered for the program you applied</p>";
                                }
                            } else {
                                echo "<p>The decision about your application has not yet been reached</p>";
                            }
                        } else {
                            echo "<p>You have not submitted your application</p>";
                        }
                        ?>
                    </div>
                </main>
            </div>
            <div></div>
        </div>

    </body>

</html>
<?php ob_end_flush(); // Send buffered output to the browser
?>