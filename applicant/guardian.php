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
    <meta charset=father" />
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
            <?php include './includes/side_navigation.php'; ?>
        </div>
        <main>
            <h1>Application</h1>
            <h2>Parent/Guardian/Sponsor Information</h2>
            <p>Provide details of your parent, a guardian or a sponsor who is supporting your education</p>
            <div>
                <?php
                $record = $registrationInformation->selectApplicantByPhoneNumber($_SESSION['id'])[0];
                $id = $record['id'];

                $demographicInformation = new Application("demographic_information", null, $applicantId = $id, null, null, null);
                if ($demographicInformation->findInformationByApplicantId()) {
                    $row = $demographicInformation->findInformationByApplicantId()[0];
                }
                ?>
                <h3>Father's Details</h3>
                <form action="" method="post" id="form">
                    <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                    <div><label for="father">Full name</label></div>
                    <div><input type="text" name="father" value=""></div>
                    <div><label for="father_occupation">Occupation</label></div>
                    <div><input type="text" name="father_occupation" value=""></div>
                    <div><label for="father_phone_number">Telephone Number</label></div>
                    <div><input type="tel" name="father_phone_number" value=""></div>
                    <div><label for="father_email_address">Email Address (optional)</label></div>
                    <div><input type="email" name="father_email_address" id="email_adress"></div>
                    <div><label for="father_postal_address">P.O Box</label></div>
                    <div><input type="text" name="father_postal_address" value=""></div>
                    <div>
                        <input type="submit" name="submit" value="save" id="submit">
                    </div>
                </form>

                <h3>Mother's Details</h3>
                <form action="" method="post" id="form">
                    <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                    <div><label for="mother">Full name</label></div>
                    <div><input type="text" name="mother" value=""></div>
                    <div><label for="occupation">Occupation</label></div>
                    <div><input type="text" name="occupation" value=""></div>
                    <div><label for="phone_number">Telephone Number</label></div>
                    <div><input type="tel" name="phone_number" value=""></div>
                    <div><label for="email_address">Email Address (optional)</label></div>
                    <div><input type="email" name="email_address" id="email_adress"></div>
                    <div><label for="postal">P.O Box</label></div>
                    <div><input type="text" name="postal" value=""></div>
                    <div>
                        <input type="submit" name="submit" value="save" id="submit">
                    </div>
                </form>

                <h3>Guardian's Details</h3>
                <form action="" method="post" id="form">
                    <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                    <div><label for="guardian">Full name</label></div>
                    <div><input type="text" name="guardian" value=""></div>
                    <div><label for="occupation">Occupation</label></div>
                    <div><input type="text" name="occupation" value=""></div>
                    <div><label for="phone_number">Telephone Number</label></div>
                    <div><input type="tel" name="phone_number" value=""></div>
                    <div><label for="email_address">Email Address (optional)</label></div>
                    <div><input type="email" name="email_address" id="email_adress"></div>
                    <div><label for="postal">P.O Box</label></div>
                    <div><input type="text" name="postal" value=""></div>
                    <div>
                        <input type="submit" name="submit" value="save" id="submit">
                    </div>
                </form>

                <h3>Sponsor's Details</h3>
                <form action="" method="post" id="form">
                    <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                    <div><label for="sponsor">Full name</label></div>
                    <div><input type="text" name="guardian" value=""></div>
                    <div><label for="occupation">Occupation</label></div>
                    <div><input type="text" name="occupation" value=""></div>
                    <div><label for="phone_number">Telephone Number</label></div>
                    <div><input type="tel" name="phone_number" value=""></div>
                    <div><label for="email_address">Email Address (optional)</label></div>
                    <div><input type="email" name="email_address" id="email_adress"></div>
                    <div><label for="postal">P.O Box</label></div>
                    <div><input type="text" name="postal" value=""></div>
                    <div>
                        <input type="submit" name="submit" value="save" id="submit">
                    </div>
                </form>

                <p id="message"></p>
                <?php


                if (isset($_POST["submit"])) {
                    // array(7) { ["applicant_id"]=> string(1) "1" ["father"]=> string(15) "Wallace Karanja" ["father_occupation"]=> string(6) "Farmer" ["father_phone_number"]=> string(10) "0702632142" ["father_email_address"]=> string(20) "wallacek10@gmail.com" ["father_postal_address"]=> string(17) "4061-20100 Nakuru" ["submit"]=> string(4) "save" } 

                    $columns = "applicant_id, father, father_occupation, father_phone_number, father_email_address, father_postal_address";
                    $parameters = ":applicant_id, :father, :father_occupation, :father_phone_number, :father_email_address, :father_postal_address";
                    $updateString = "applicant_id = :applicant_id, father = :father, father_occupation = :father_occupation, father_phone_number = :father_phone_number, father_email_address = :father_email_address, father_postal_address = :father_postal_address";
                    $application = new Application("parent_information", $_POST, $id, $columns, $parameters, $updateString);
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