<?php
// include './process_form.php';
// include './Form.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="script.js" defer></script> -->
    <title>Form</title>
    <style>
        .main {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
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
            <h1>Upload Documents</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="main">
                    <div><label for="birth_certificate">Birth Certificate</label></div>
                    <div><input type="file" name="birth_certificate" id="birth_certificate" />
                    </div>
                    <div><input type="submit" name="submit" value="Upload" id="submit" /></div>
                </div>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="main">
                    <div><label for="kcse">Kenya Certificate of Secondary Education (KCSE)</label></div>
                    <div><input type="file" name="kcse" id="kcse" />
                    </div>
                    <div><input type="submit" name="submit" value="Upload" id="submit" /></div>
                </div>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="main">
                    <div><label for="kcpe">Kenya Certificate of Primary Education (KCPE)</label></div>
                    <div><input type="file" name="kcpe" id="kcse" />
                    </div>
                    <div><input type="submit" name="submit" value="Upload" id="submit" /></div>
                </div>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="main">
                    <div><label for="id">Identity Card</label></div>
                    <div><input type="file" name="id_card" id="id" />
                    </div>
                    <div><input type="submit" name="submit" value="Upload" id="submit" /></div>
                </div>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="main">
                    <div><label for="leaving_certificate">School Leaving Certificate</label></div>
                    <div><input type="file" name="leaving_certificate" id="id" />
                    </div>
                    <div><input type="submit" name="submit" value="Upload" id="submit" /></div>
                </div>
            </form>

            <p id="message"></p>
            <?php
            if (isset($_FILES['birth_certificate'])) {
                $file_tmp_name = $_FILES['birth_certificate']['tmp_name'];
                $file_name = $_FILES['birth_certificate']['name'];
                // $fileSize = $_FILES['birth_certificate']['size'];
                // $maxFileSize = 2 * 1024 * 1024;
                // $uploadDir = "uploads/";
                // $destination = $uploadDir . $file_name;
                // if (move_uploaded_file($file_tmp_name, $destination)) {
                //     echo "File upload successful";
                // } else {
                //     echo "Failed to upload file";
                // }
                echo $file_name;
                echo "<br>";
                $fileExtension = pathinfo($file_name, PATHINFO_EXTENSION);
                $_FILES['birth_certificate']['name'] = "Firstname_Lastname_" . "birth_certificate." . $fileExtension;
                $file_name = $_FILES['birth_certificate']['name'];
                echo $file_name;
                // var_dump($_FILES['birth_certificate']['name']);
                // var_dump($file_name);
                // var_dump($file_tmp_name); // path to file in tmp folder
            }

            // fields birth_certificate, kcse, kcpe, id_card, leaving_certificate
            ?>
    </div>
    </main>
    <div></div>
    </div>

</body>

</html>