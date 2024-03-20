<?php
session_start();
include './Applicant.php';
include './FileUpload.php';
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
    <link rel="stylesheet" href="css/styles.css">
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
        <div></div>
        <main>
            <div class="main-content">
                <div>
                    <h1>Upload Documents</h1>
                </div>
                <div class="form-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-field"><label for="birth_certificate">Birth Certificate</label></div>
                            <div class="form-field"><input type="file" name="birth_certificate" id="birth_certificate" />
                            </div class="form-field">
                            <div class="form-field"><input type="submit" name="submit" value="Upload" id="submit" /></div>
                        </div>
                    </form>
                </div>
                <div class="form-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-field"><label for="kcse">Kenya Certificate of Secondary Education (KCSE)</label></div>
                            <div class="form-field"><input type="file" name="kcse" id="kcse" />
                            </div>
                            <div class="form-field"><input type="submit" name="submit" value="Upload" id="submit" /></div>
                        </div>
                    </form>
                </div>
                <div class="form-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-field"><label for="kcpe">Kenya Certificate of Primary Education (KCPE)</label></div>
                            <div class="form-field"><input type="file" name="kcpe" id="kcse" />
                            </div>
                            <div class="form-field"><input type="submit" name="submit" value="Upload" id="submit" /></div>
                        </div>
                    </form>
                </div>
                <div class="form-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-field"><label for="id">Identity Card</label></div>
                            <div class="form-field"><input type="file" name="id_card" id="id" />
                            </div>
                            <div class="form-field"><input type="submit" name="submit" value="Upload" id="submit" /></div>
                        </div>
                    </form>
                </div>
                <div class="form-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-field"><label for="leaving_certificate">School Leaving Certificate</label></div>
                            <div class="form-field"><input type="file" name="leaving_certificate" id="id" />
                            </div>
                            <div class="form-field"><input type="submit" name="submit" value="Upload" id="submit" /></div>
                        </div>
                    </form>
                </div>
            </div>
            <p id="message"></p>
            <?php

            if (isset($_FILES['birth_certificate'])) {
                $birthCertificate = new FileUpload("birth_certificate");
                var_dump($birthCertificate->uploadFile());
                echo $birthCertificate->uploadStatus;
            }
            ?>
        </main>
        <div></div>
    </div>

</body>

</html>