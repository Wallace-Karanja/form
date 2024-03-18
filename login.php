<?php
// include './process_form.php';
// include './Form.php';
include './Applicant.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="../script.js" defer></script> -->
    <title>Form</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: 1.5fr 1.25fr 1.5fr;
        }
    </style>
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
                    <div class="links">
                        <li><a href="register.php">Register</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div></div>
        <main>
            <h1>Login</h1>
            <div>
                <form action="" method="post" id="form">
                    <div>
                        <label for="phoneNumber">Phone Number<span id="phone_number"></span></label>
                        <input type="tel" name="phone_number" id="phoneNumber" value="<?php echo (isset($_POST['phone_number']) ? $_POST['phone_number'] : ""); ?>" required />
                    </div>
                    <div>
                        <label for="pass">Password<span id="password"></span></label>
                        <input type="password" name="password" id="pass" value="<?php echo (isset($_POST['password']) ? $_POST['password'] : ""); ?>" required />
                    </div>
                    <div><input type="submit" name="submit" value="Login" id="submit" required /></div>
                </form>
                <p id="message">
                    <?php
                    if (isset($_POST['submit'])) {
                        $applicant = new Applicant();
                        $applicant->loginApplicant();
                        $queryStatus = $applicant->queryStatus;
                        switch ($queryStatus) {
                            case 0:
                                echo "Success";
                                $url = "./index.php";
                                header("Location:" . $url);
                                break;
                            case 1:
                                $url = 'passreset.php';
                                echo "Incorrect password ! <a href='$url'>Reset Password</a>";
                                break;
                            case 2:
                                echo "Incorrect phone number"; // user does not exist
                                break;
                            default:
                                echo "Contact Applicant !";
                                break;
                        }
                    }
                    ?>
                </p>
            </div>
        </main>
        <div></div>
    </div>

</body>

</html>