<?php
session_start();
include '../applicant/Form.php';
include './Admin.php';
include './Course.php';
include '../applicant/includes/helper_funcs.php';
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
                    <div class="links">
                        <li><a href="logs.php">Logs</a></li>
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
            <?php include './includes/side_navigation.html'; ?>
        </div>
        <main>
            <div>

                <div>
                    <?php
                    if (isset($_POST['submit']) && $_POST['submit'] == "Register") {
                        $table = "courses";
                        $columns = "course, department_id, level_id, exam_body_id, duration_id";
                        $parameters = ":course, :department_id, :level_id, :exam_body_id, :duration_id";
                        $course = new Course($table, $columns, $parameters);
                        $course->create();
                        $message = " created successifuly";
                        header("refresh:5;url=" . $_SERVER['PHP_SELF']);
                    }

                    if (isset($_POST['submit']) && $_POST['submit'] == "Update") {
                        $course = new Course("courses");
                        $course->update();
                        $message = " updated successifuly";
                        header("refresh:5;url=" . $_SERVER['PHP_SELF']);
                    }

                    if (isset($_GET['deleteId'])) {
                        $course = new Course("courses");
                        $course->delete();
                    }
                    ?>

                    <?php if (isset($_GET['updateId'])) {
                        $course = new Course("courses"); ?>
                        <h1>Update Course</h1>
                        <form action="" method="post" id="form">
                            <input type="hidden" name="id" value="<?php echo $_GET['updateId']; ?>">
                            <div><label for="department">Department name</label></div>
                            <div><input type="text" name="department" value="<?php echo $course->selectById(); ?>" id="department" required />
                            </div>
                            <div><input type="submit" name="submit" value="Update" id="submit"></div>
                        </form>
                        <p class="message"><?php echo (isset($message) ? $message : ""); ?></p>
                    <?php } else { ?>
                        <h1>Create Course</h1>
                        <form action="" method="post" id="form">
                            <div><label for="course">Course</label></div>
                            <div><input type="text" name="course" id="course" required /></div>
                            <div><label for="department">Department</label></div>
                            <div>
                                <?php
                                $course = new Course("departments", "department");
                                $departments = $course->selectAll();
                                ?>
                                <select name="department_id" id="department">
                                <option value="0">--Select a Department --</option>
                                    <?php foreach($departments as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['department']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div><label for="level">Level</label></div>
                            <div>
                                <!-- <input type="text" name="level" id="level" required /> -->
                                <select name="level_id" id="level">
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level N</option>
                                </select>
                            </div>
                            <div><label for="exam_body">Exam Body</label></div>
                            <div>
                                <select name="exam_body_id" id="exam_body">
                                    <option value="1">Exam Body 1</option>
                                    <option value="2">Exam Body 2</option>
                                    <option value="3">Exam Body N</option>
                                </select>
                            </div>
                            <div><label for="duration">Duration</label></div>
                            <div>
                                <!-- <input type="text" name="duration" id="duration" required /> -->
                                <select name="duration_id" id="duration">
                                    <option value="1">Duration 1</option>
                                    <option value="2">Duration 2</option>
                                    <option value="3">Duration N</option>
                                </select>
                            </div>
                            <div><input type="submit" name="submit" value="Register" id="submit"></div>
                        </form>
                        <p class="message"><?php echo (isset($message) ? $message : ""); ?></p>
                    <?php } ?>
                    <?php
                    $course = new Course("courses", "");
                    $courses = $course->selectAll();
                    ?>
                    <h2>Courses</h2>
                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Course</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Exam Body</th>
                            <th>Duration</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $row) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['course']; ?></td>
                                    <td><?php echo $row['department_id']; ?></td>
                                    <td><?php echo $row['level_id']; ?></td>
                                    <td><?php echo $row['exam_body_id']; ?></td>
                                    <td><?php echo $row['duration_id']; ?></td>
                                    <td><a href="<?php echo $_SERVER['PHP_SELF']."?updateId=" . $row['id'] ?>">Update</a></td>
                                    <td><a href="<?php echo $_SERVER['PHP_SELF']."?deleteId=" . $row['id'] ?>">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <div>
            <nav>
                <ul>
                    <li><a href="adminLogs.php">Admin Logs</a></li>
                    <li><a href="applicantLogs.php">Applicant Logs</a></li>
                </ul>
            </nav>
        </div>
    </div>

</body>

</html>