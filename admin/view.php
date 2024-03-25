<?php
include '../applicant/Form.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../applicant/styles.css">
    <link rel="stylesheet" href="./css/styles.css">
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
        <div class="info">
            <div>
                <h1>Application #<?php echo $_GET['id']; ?></h1>
            </div>
            <div>
                <h2>Personal Information</h2>
            </div>
            <div>
                <main>
                    <div class="info-container">

                        <?php
                        $application = new Form();
                        $info = $application->selectById();
                        if (!empty($info)) { ?>
                            <?php foreach ($info as $row) {
                            ?>
                                <div><b>Name</b> : <?php echo $row['firstname'] . " " . $row['lastname']; ?></div>
                                <div><b>Email Address</b> : <?php echo $row['email_address']; ?></div>
                                <div><b>Phone Number</b> : <?php echo $row['phone_number']; ?></div>
                            <?php } ?>
                        <?php } else { ?>
                            <div>
                                <p>Record does not exist !</p>
                            </div>
                        <?php } ?>
                    </div>
                </main>
            </div>
            <div class="documents">
                <h2>Applicant Documents</h2>
                <?php
                $documents = $application->selectDocumentsById();
                if (empty($documents)) { ?>
                    <p>Documents have not been uploaded by applicant</p>
                <?php } else { ?>
                    <?php
                    foreach ($documents as $row) { ?>
                        <div class="doc">
                            <div>
                                <p>Birth Certificate</p>
                            </div>
                            <div>
                                <p><a href=" <?php echo "../applicant/uploads/" . $row['birth_certificate']; ?>" target="_blank"><?php echo $row['birth_certificate']; ?></a></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="doc">
                        <div>
                            <p>KCSE</p>
                        </div>
                        <div>
                            <p><a href=" <?php echo "../applicant/uploads/" . $row['kcse']; ?>" target="_blank"><?php echo $row['kcse']; ?></a></p>
                        </div>
                    </div>
                    <div class="doc">
                        <div>
                            <p>KCPE</p>
                        </div>
                        <div>
                            <p><a href=" <?php echo "../applicant/uploads/" . $row['kcpe']; ?>" target="_blank"><?php echo $row['kcpe']; ?></a></p>
                        </div>
                    </div>
                    <div class="doc">
                        <div>
                            <p>Identity Card</p>
                        </div>
                        <div>
                            <p><a href=" <?php echo "../applicant/uploads/" . $row['id_card']; ?>" target="_blank"><?php echo $row['id_card']; ?></a></p>
                        </div>
                    </div>
                    <div class="doc">
                        <div>
                            <p>School Leaving Certleaving_certificate</p>
                        </div>
                        <div>
                            <p><a href=" <?php echo "../applicant/uploads/" . $row['leaving_certificate']; ?>" target="_blank"><?php echo $row['leaving_certificate']; ?></a></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div></div>
    </div>

</body>

</html>