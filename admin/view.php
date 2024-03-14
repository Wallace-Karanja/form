<?php
include '../Form.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles.css">
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
        </div>
        <div></div>
    </div>

</body>

</html>