<?php
ob_start();
session_start();
include 'Form.php';
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
        <link rel="stylesheet" href="./styles.css">
        <link rel="stylesheet" href="../admin/css/styles.css">
        <link rel="stylesheet" href="../admin/css/application_view_styles.css">
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
                            <li class="links"><a href="logout.php">Logout</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="container">
            <div>
                <div>
                    <?php include './includes/side_navigation.php'; ?>
                </div>
            </div>

	    <div class="main">
		<style>
		p {
		 margin: 0;
		}
		</style>
                <div>
                    <p>
                        <?php
                        // find if application is submitted
                        $application = new Application(null, null, $applicantId);
                        ?>
                    </p>
                    <h1>Your Application
                        (<?php echo ($application->submitRecordExist() && $application->applicationIsSubmitted() ? "submitted" : "not submitted"); ?>)
                    </h1>
                </div>
                <div class="info" style="background-color: wheat;">
                    <?php
                    $application = new Application(null, null, $applicantId, null, null, null);
                    $info = $application->selectApplicationByApplicantId();
                    if (!empty($info)) { ?>
                        <?php foreach ($info as $row) { ?>
                            <div>
                                <div>
                                    <h2>Personal Information</h2>
                                </div>
                                <div class="info-container">
                                    <div><b>Name</b> :
                                        <?php echo $row['firstname'] . " " . $row['second_name'] . " " . $row['lastname']; ?>
                                    </div>
                                    <div><p><b>Gender</b> : <?php echo $row['gender']; ?></p></div>
                                    <div><p><b>Date of Birth</b> : <?php echo $row['birthday']; ?></p></div>
                                    <div><p><b>Phone Number</b> : <?php echo $row['phone_number']; ?></p></div>
                                    <div><p><b>Alternative Phone Number</b> : <?php echo $row['alternative_phone']; ?></p></div>
                                    <div><p><b>Email Address</b> : <?php echo $row['email_address']; ?></p></div>
                                    <div><p><b>Phone Number</b> : <?php echo $row['phone_number']; ?></p></div>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <h2>Demographic Information</h2>
                                </div>
                                <div class="info-container">
                                    <div><p><b>County</b>: <?php echo $row['county_id']; ?></p></div>
                                    <div><p><b>Sub-County</b>: <?php echo $row['sub_county_id']; ?></p></div>
                                    <div><p><b>Location</b>: <?php echo $row['location']; ?></p></div>
                                    <div><p><b>Sub-Location</b>: <?php echo $row['sub_location']; ?></p></div>
                                    <div><p><b>Village</b>: <?php echo $row['village']; ?></p></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h2>Academic Information</h2>
                                </div>
                                <div class="info-container">
                                    <div><p><b>Primary School Name</b>: <?php echo $row['primary_school_name']; ?></p></div>
                                    <div><p><b>KCPE Index Number</b>: <?php echo $row['kcpe_index_number']; ?></p></div>
                                    <div><p><b>KCPE Marks</b>: <?php echo $row['kcpe_marks'] . "/500"; ?></p></div>
                                    <div><b>Date of Primary Education Completion</b>:
                                        <?php echo $row['date_of_primary_education_completion']; ?>
                                    </div>
                                    <div><p><b>Secondary School Name</b>: <?php echo $row['secondary_school_name']; ?></p></div>
                                    <div><p><b>KCSE Index Number</b>: <?php echo $row['kcse_index_number']; ?></p></div>
                                    <div><p><b>KCSE Grade</b>: <?php echo $row['kcse_grade']; ?></p></div>
                                    <div><b>Date of Secondary Education Completion</b>:
                                        <?php echo $row['date_of_secondary_education_completion']; ?>
                                    </div>
                                    <div><p><b>Tertiary Institute Name</b>: <?php echo $row['tertiary_institute_name']; ?></p></div>
                                    <div><p><b>Tertiary Course Name</b>: <?php echo $row['tertiary_course_name']; ?></p></div>
                                    <div><p><b>Tertiary Classification</b>: <?php echo $row['tertiary_classification']; ?></p></div>
                                    <div><b>Date of Tertiary Education Completion</b>:
                                        <?php echo $row['date_of_tertiary_education_completion']; ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h2>Selected Academic Program</h2>
                                </div>
                                <div class="info-container">
                                    <div><p><b>Course Title</b>:<?php echo $row['course']; ?></p></div>
                                    <div><p><b>Department</b>:<?php echo $row['department_id']; ?></p></div>
                                    <div><p><b>Course Level</b>:<?php echo $row['level_id']; ?></p></div>
                                    <div><p><b>Examining Body</b>:<?php echo $row['exam_body_id']; ?></p></div>
                                    <div><p><b>Course Duration</b>:<?php echo $row['duration_id']; ?></p></div>
                                    <div><p><b>Course Requirement</b>:<?php echo $row['requirement']; ?></p></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h2>Parent/Guardian/Sponsor Information</h2>
                                </div>
                                <div class="info-container">
                                    <div>
                                        <h3>Father</h3>
                                    </div>
                                    <div></div>
                                    <div><p><b>Father's Name</b>:<?php echo $row['father']; ?></p></div>
                                    <div><p><b>Father's occupation</b>:<?php echo $row['father_occupation']; ?></p></div>
                                    <div><p><b>Father's Phone Number</b>:<?php echo $row['father_phone_number']; ?></p></div>
                                    <div><p><b>Father's Email address</b>:<?php echo $row['father_email_address']; ?></p></div>
                                    <div><p><b>Father's Postal address</b>:<?php echo $row['father_postal_address']; ?></p></div>
                                    <div></div>
                                    <div>
                                        <h3>Mother</h3>
                                    </div>
                                    <div></div>
                                    <div><p><b>Mother's Name</b>:<?php echo $row['mother']; ?></p></div>
                                    <div><p><b>Mother's occupation</b>:<?php echo $row['mother_occupation']; ?></p></div>
                                    <div><p><b>Mother's Phone Number</b>:<?php echo $row['mother_phone_number']; ?></p></div>
                                    <div><p><b>Mother's Email address</b>:<?php echo $row['mother_email_address']; ?></p></div>
                                    <div><p><b>Mother's Postal address</b>:<?php echo $row['mother_postal_address']; ?></p></div>
                                    <div></div>
                                    <div>
                                        <h3>Guardian</h3>
                                    </div>
                                    <div></div>
                                    <div><p><b>Guardian's Name</b>:<?php echo $row['guardian']; ?></p></div>
                                    <div><p><b>Guardian's occupation</b>:<?php echo $row['guardian_occupation']; ?></p></div>
                                    <div><p><b>Guardian's Phone Number</b>:<?php echo $row['guardian_phone_number']; ?></p></div>
                                    <div><p><b>Guardian's Email address</b>:<?php echo $row['guardian_email_address']; ?></p></div>
                                    <div><p><b>Guardian's Postal address</b>:<?php echo $row['guardian_postal_address']; ?></p></div>
                                    <div></div>
                                    <div>
                                        <h3>Sponsor</h3>
                                    </div>
                                    <div></div>
                                    <div><p><b>Sponsor's Name</b>:<?php echo $row['sponsor']; ?></p></div>
                                    <div><p><b>Sponsor's occupation</b>:<?php echo $row['sponsor_occupation']; ?></p></div>
                                    <div><p><b>Sponsor's Phone Number</b>:<?php echo $row['sponsor_phone_number']; ?></p></div>
                                    <div><p><b>Sponsor's Email address</b>:<?php echo $row['sponsor_email_address']; ?></p></div>
                                    <div><p><b>Sponsor's Postal address</b>:<?php echo $row['sponsor_postal_address']; ?></p></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h2>Attached Documents</h2>
                                </div>
                                <div class="info-container">
                                    <div><p><b>KCPE</b>:<?php echo $row['kcpe']; ?></p></div>
                                    <div><p><b>KCSE</b>:<?php echo $row['kcse']; ?></p></div>
                                    <div><p><b>ID Card</b>:<?php echo $row['id_card']; ?></p></div>
                                    <div><p><b>Birth Certificate</b>:<?php echo $row['birth_certificate']; ?></p></div>
                                    <div><p><b>School Leaving Certificate</b>:<?php echo $row['leaving_certificate']; ?></p></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div>
                        <?php
                        $application = new Application(null, $_POST, $applicantId);
                        ?>
                        <style>
                            #form {
                                display: grid;
                                grid-template-columns: 1fr;
                                margin: auto;
                                width: 50%;
                                border: none;
                            }
                        </style>
                        <form action="" method="post" id="form">
                            <input type="hidden" name="applicant_id" value="<?php echo $applicantId; ?>">
                            <?php
                            if (!$application->applicationIsSubmitted()) { ?>
                                <div><input type="submit" name="submit" value="Submit Application" class="submit"
                                        style="background-color: green; font-weight: bold;"></div>
                            <?php } ?>
                            <?php
                            if ($application->applicationIsSubmitted()) { ?>
                                <div><input type="submit" name="retract" value="Withdraw Application" class="submit"
                                        style="background-color: red; color:black; font-weight: bold;"></div>
                            <?php }
                            ?>

                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $application = new Application(null, $_POST, $applicantId);
                            if ($application->submitApplication()) {
                                echo "You have submitted your application";
                                refresh($_SERVER['PHP_SELF'], '3');
                            }
                        }

                        if (isset($_POST['retract'])) {
                            $application = new Application(null, $_POST, $applicantId);
                            if ($application->retractApplication()) {
                                echo "You have withdrawn your application";
                                refresh($_SERVER['PHP_SELF'], '3');
                            }
                        }
                        ?>
                    </div>

                <?php } else { ?>
                    <div>
                        <p>Your application is incomplete ! you must complete all of the application sections inorder to
                            submit your application</p>
                    </div>
                <?php } ?>
            </div>

            <div></div>
        </div>
    </body>

</html>
<?php ob_end_flush(); ?>
