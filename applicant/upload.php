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
                        <li class="links"><a href="./admin/">Admin</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div></div>
        <main>
            <h1>Upload Documents</h1>
            <div>
                <!-- <form action="" method="post" id="form" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name of Document</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="document">Document</label>
                        <input type="file" name="document" id="document">
                    </div>
                    <div></div>
                    <div><input type="submit" name="submit" value="upload" id="submit" /></div>
                </form> -->

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="document">Kenya Certificate of Secondary Education (KCSE):</label>
                    <input type="file" id="document" name="document" accept=".pdf,.doc,.docx"><br><br>
                    <input type="submit" value="Upload">
                </form>

                <p id="message"></p>
                <?php
                if (isset($_FILES['document'])) {
                    $file_tmp_name = $_FILES['document']['tmp_name'];
                    $file_name = $_FILES['document']['name'];
                    // echo $file_tmp_name;
                    // echo $file_name;
                    $fileSize = $_FILES['document']['size'];
                    // echo $fileSize;
                    $maxFileSize = 2 * 1024 * 1024;
                    // echo ($fileSize < $maxFileSize ? "Okay" : "not okay");
                    $uploadDir = "uploads/";
                    $destination = $uploadDir . $file_name;
                    // if (move_uploaded_file($file_tmp_name, $destination)) {
                    //     echo "File upload successful";
                    // } else {
                    //     echo "Failed to upload file";
                    // }

                    var_dump($_FILES);
                } else {
                    echo "Error uploading file";
                }

                ?>
            </div>
        </main>
        <div></div>
    </div>

</body>

</html>