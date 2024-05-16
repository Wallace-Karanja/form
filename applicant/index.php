<?php
include '../admin/Admin.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/styles.css">
        </style>
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
                            <li class="links"><a href="#">About</a></li>
                        </div>
                        <div>
                            <li class="links"><a href="courses.php">Courses</a></li>
                        </div>
                        <div>
                            <li class="links"><a href="login.php">Login</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="container">
            <div></div>
            <main>
                <?php
                // applicants should be able to read intake table
                $applicant = new Admin();
                $intakes = $applicant->displayActiveIntakes();
                ?>
                <h1>Welcome</h1>
                <div>
                    <p>Welcome to Course Application Section</p>
                    <?php
                    $today = date("Y-m-d");
                    if (!empty($intakes)) { ?>
                        <p>Apply a course for the following intake(s).</p>
                        <ul>
                            <?php foreach ($intakes as $intake) { ?>
                                <?php if ($today < $intake['end_date']) { ?>
                                    <li><?php echo "<b>" . $intake['intake'] . "</b>"; ?></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p>There are no active intakes currently, please check later !</p>
                    <?php } ?>
                    </ul>
                </div>
                <div>
            </main>
            <div></div>
        </div>

    </body>

</html>