<?php
session_start();
include './Applicant.php';
include '../admin/Course.php';
if (!isset($_SESSION['id'])) {
    $url = './login.php';
    header("Location:" . $url);
}

if (isset($_GET["courseId"])) {
    $_SESSION['courseId'] = $_GET['courseId'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
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
            <nav>
                <ul>
                    <li><a href="application.php">Personal Information</a></li>
                    <li><a href="academics.php">Academic Information</a></li>
                    <li><a href="course.php<?php echo (isset($_GET['courseId']) ? '?courseId=' . $_GET['courseId'] : '') ?>"">Select Course</a></li>
                    <li><a href=" demographics.php">Demographic Information</a></li>
                    <li><a href="demographics.php">Parent/Guardian Information</a></li>
                    <li><a href="upload.php">Upload Documents</a></li>
                </ul>
            </nav>
        </div>
        <main>
            <h1>Application</h1>
            <h2>Select a Course</h2>

            <style>
                .container {
                    display: grid;
                    grid-template-columns: 1.1fr 1fr 1.1fr;
                }
            </style>
            <form action="" method="post" id="form">
                <div>
                    <label for="course">Course</label>
                </div>
                <div>
                    <select name="course_title" id="course">
                        <?php
                        if (isset($_GET["courseId"]) || isset($_SESSION["courseId"])) {
                            $course = new Course("courses_view", "*");
                            $record = $course->selectColumnsById()[0];
                        ?>
                            <option value="<?php echo $record['id']; ?>"><?php echo $record['course'] . ', ' . $record['level'] . ', ' . $record['exam_body']; ?></option>
                            <?php
                            $course = new Course("courses_view", "*");
                            $courses = $course->selectAll();
                            foreach ($courses as $course) { ?>
                                <option value="<?php echo $course['id']; ?>"><?php echo $course['course'] . ', ' . $course['level'] . ', ' . $course['exam_body']; ?></option>
                            <?php } ?>
                        <?php } else { ?>
                            <option value="">--select a course --</option>
                            <?php
                            $course = new Course("courses_view", "*");
                            $courses = $course->selectAll();
                            foreach ($courses as $course) { ?>
                                <option value="<?php echo $course['id']; ?>"><?php echo $course['course'] . ', ' . $course['level'] . ', ' . $course['exam_body']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <!-- <div></div> -->
                <div><input type="submit" name="submit" value="save" id="submit" /></div>

            </form>
            <?php
            if (isset($_POST['submit'])) {
                var_dump($_POST);
            }
            ?>
            <div>

            </div>
        </main>
        <div></div>
    </div>

</body>

</html>