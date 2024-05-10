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
                <main>
                    <h1>Application Status</h1>
                    <div style="background-color: wheat; padding:5px; border: 1px solid black; border-radius: 5px;">
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
                                    ?>
                                    <p>Congratulations, after careful review of your application, we are pleased to inform you that
                                        you have been admitted to the program
                                        <b><?php echo $info['course'] . ' ' . $level; ?></b>.In the department
                                        of <b><?php echo $department; ?></b>. Your admission number is :
                                        <i><?php //echo $admissionNumber; ?></i>.
                                    </p>
                                    <p>To <b>accept</b> or <b>decline</b> the admission offer, click the appropriate button below.
                                    </p>
                                    <form action="" method="post">
                                        <input type="hidden" name="applicant_id" value="<?php echo $applicantId; ?>">
                                        <input type="submit" name="accept" value="Accept" style="color: green;">
                                        <input type="submit" name="decline" value="Decline" style="color: red;">
                                    </form>
                                <?php } else { ?>
                                    <p>We regret to inform you that your application was not considered for the program you
                                        applied</p>
                                <?php } ?>
                            <?php } else { ?>
                                <p>The decision about your application has not yet been reached</p>
                            <?php }
                        } else {
                            echo "<p>You have not submitted your application</p>";
                        }
                        ?>

                    </div>
                    <?php
                    if (isset($_POST['accept'])) {
                        var_dump($_POST);
                        // code
                    }
                    if (isset($_POST['decline'])) {
                        var_dump($_POST);
                        // code
                    }
                    ?>
                </main>
            </div>
            <div></div>
        </div>

    </body>

</html>
<?php ob_end_flush(); // Send buffered output to the browser
?>