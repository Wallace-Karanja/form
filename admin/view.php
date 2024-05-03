<?php
session_start();
include '../applicant/Form.php';
include '../applicant/Applicant.php';
include '../applicant/Application.php';
if (!isset($_SESSION['id']) && $_SESSION['id'] !== 29334778) {
    $url = './login.php';
    header("Location:" . $url);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../applicant/styles.css">
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="./css/application_view_styles.css">
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
            <div></div>

            <div class="main">
                <div>
                    <h1>Application no: <?php echo $_GET['id']; ?></h1>
                </div>
                <div class="info">
                    <?php
                    $application = new Application();
                    $info = $application->selectApplicationById();
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
                                    <div><b>Gender</b> : <?php echo $row['gender']; ?></div>
                                    <div><b>Date of Birth</b> : <?php echo $row['birthday']; ?></div>
                                    <div><b>Phone Number</b> : <?php echo $row['phone_number']; ?></div>
                                    <div><b>Alternative Phone Number</b> : <?php echo $row['alternative_phone']; ?></div>
                                    <div><b>Email Address</b> : <?php echo $row['email_address']; ?></div>
                                    <div><b>Phone Number</b> : <?php echo $row['phone_number']; ?></div>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <h2>Demographic Information</h2>
                                </div>
                                <div class="info-container">
                                    <div><b>County</b>: <?php echo $row['county_id']; ?></div>
                                    <div><b>Sub-County</b>: <?php echo $row['sub_county_id']; ?></div>
                                    <div><b>Location</b>: <?php echo $row['location']; ?></div>
                                    <div><b>Sub-Location</b>: <?php echo $row['sub_location']; ?></div>
                                    <div><b>Village</b>: <?php echo $row['village']; ?></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h2>Academic Information</h2>
                                </div>
                                <div class="info-container">
                                    <div><b>Primary School Name</b>: <?php echo $row['primary_school_name']; ?></div>
                                    <div><b>KCPE Index Number</b>: <?php echo $row['kcpe_index_number']; ?></div>
                                    <div><b>KCPE Marks</b>: <?php echo $row['kcpe_marks'] . "/500"; ?></div>
                                    <div><b>Date of Primary Education Completion</b>:
                                        <?php echo $row['date_of_primary_education_completion']; ?>
                                    </div>
                                    <div><b>Secondary School Name</b>: <?php echo $row['secondary_school_name']; ?></div>
                                    <div><b>KCSE Index Number</b>: <?php echo $row['kcse_index_number']; ?></div>
                                    <div><b>KCSE Grade</b>: <?php echo $row['kcse_grade']; ?></div>
                                    <div><b>Date of Secondary Education Completion</b>:
                                        <?php echo $row['date_of_secondary_education_completion']; ?>
                                    </div>
                                    <div><b>Tertiary Institute Name</b>: <?php echo $row['tertiary_institute_name']; ?></div>
                                    <div><b>Tertiary Course Name</b>: <?php echo $row['tertiary_course_name']; ?></div>
                                    <div><b>Tertiary Classification</b>: <?php echo $row['tertiary_classification']; ?></div>
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
                                    <div><b>Course Title</b>:<?php echo $row['course']; ?></div>
                                    <div><b>Department</b>:<?php echo $row['department_id']; ?></div>
                                    <div><b>Course Level</b>:<?php echo $row['level_id']; ?></div>
                                    <div><b>Examining Body</b>:<?php echo $row['exam_body_id']; ?></div>
                                    <div><b>Course Duration</b>:<?php echo $row['duration_id']; ?></div>
                                    <div><b>Course Requirement</b>:<?php echo $row['requirement']; ?></div>
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
                                    <div><b>Father's Name</b>:<?php echo $row['father']; ?></div>
                                    <div><b>Father's occupation</b>:<?php echo $row['father_occupation']; ?></div>
                                    <div><b>Father's Phone Number</b>:<?php echo $row['father_phone_number']; ?></div>
                                    <div><b>Father's Email address</b>:<?php echo $row['father_email_address']; ?></div>
                                    <div><b>Father's Postal address</b>:<?php echo $row['father_postal_address']; ?></div>
                                    <div></div>
                                    <div>
                                        <h3>Mother</h3>
                                    </div>
                                    <div></div>
                                    <div><b>Mother's Name</b>:<?php echo $row['mother']; ?></div>
                                    <div><b>Mother's occupation</b>:<?php echo $row['mother_occupation']; ?></div>
                                    <div><b>Mother's Phone Number</b>:<?php echo $row['mother_phone_number']; ?></div>
                                    <div><b>Mother's Email address</b>:<?php echo $row['mother_email_address']; ?></div>
                                    <div><b>Mother's Postal address</b>:<?php echo $row['mother_postal_address']; ?></div>
                                    <div></div>
                                    <div>
                                        <h3>Guardian</h3>
                                    </div>
                                    <div></div>
                                    <div><b>Guardian's Name</b>:<?php echo $row['guardian']; ?></div>
                                    <div><b>Guardian's occupation</b>:<?php echo $row['guardian_occupation']; ?></div>
                                    <div><b>Guardian's Phone Number</b>:<?php echo $row['guardian_phone_number']; ?></div>
                                    <div><b>Guardian's Email address</b>:<?php echo $row['guardian_email_address']; ?></div>
                                    <div><b>Guardian's Postal address</b>:<?php echo $row['guardian_postal_address']; ?></div>
                                    <div></div>
                                    <div>
                                        <h3>Sponsor</h3>
                                    </div>
                                    <div></div>
                                    <div><b>Sponsor's Name</b>:<?php echo $row['sponsor']; ?></div>
                                    <div><b>Sponsor's occupation</b>:<?php echo $row['sponsor_occupation']; ?></div>
                                    <div><b>Sponsor's Phone Number</b>:<?php echo $row['sponsor_phone_number']; ?></div>
                                    <div><b>Sponsor's Email address</b>:<?php echo $row['sponsor_email_address']; ?></div>
                                    <div><b>Sponsor's Postal address</b>:<?php echo $row['sponsor_postal_address']; ?></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h2>Attached Documents</h2>
                                </div>
                                <div class="info-container">
                                    <div><b>KCPE</b>:<?php echo $row['kcpe']; ?></div>
                                    <div><b>KCSE</b>:<?php echo $row['kcse']; ?></div>
                                    <div><b>ID Card</b>:<?php echo $row['id_card']; ?></div>
                                    <div><b>Birth Certificate</b>:<?php echo $row['birth_certificate']; ?></div>
                                    <div><b>School Leaving Certificate</b>:<?php echo $row['leaving_certificate']; ?></div>
                                </div>
                            </div>
                        <?php } ?>

                        <div>
                        <?php } else { ?>
                            <div>
                                <p>Application with id <?php echo $_GET['id']; ?> does not exist !</p>
                            </div>
                        <?php } ?>
                        <?php
                        // print_r($info);
                        ?>
                    </div>
                </div>
            </div>
            <div></div>
        </div>

    </body>

</html>