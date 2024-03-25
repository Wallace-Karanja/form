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
            <nav>
                <ul>
                    <li><a href="departments.php">Create Departments</a></li>
                    <li><a href="create_examining_bodies.php">Create Examining Bodies</a></li>
                    <li><a href="create_courses.php">Create Courses</a></li>
                </ul>
            </nav>
        </div>
        <main>
            <div>
                
                <div>
                <?php
                    if (isset($_POST['submit']) && $_POST['submit'] == "Register") {
                        $course = new Course();
                        $course->createDepartment();
                        $message = "Department created successifuly";
                        header("refresh:5;url=".$_SERVER['PHP_SELF']);
                    }

                    if (isset($_POST['submit']) && $_POST['submit'] == "Update") {
                        $course = new Course();
                        $course->updateDepartment();
                        $message = "Department updated successifuly";
                        header("refresh:5;url=".$_SERVER['PHP_SELF']);
                    }

                    if (isset($_GET['deleteId'])) {
                        $course = new Course();
                        $course->deleteDepartment();
                    }
                ?>

                    <?php if(isset($_GET['updateId']))
                    { $course = new Course(); ?>
                    <h1>Update Department</h1>
                    <form action="" method="post" id="form">
                        <input type="hidden" name="id" value="<?php echo $_GET['updateId'];?>">
                        <div><label for="department">Department name</label></div>
                        <div><input type="text" name="department" value = "<?php echo $course->selectDepartmentById();?>" id="department" required />
                        </div>
                        <div><input type="submit" name="submit" value="Update" id="submit"></div>
                    </form>
                    <p class="message"><?php echo(isset($message) ? $message : "");?></p>
                    <?php } else { ?>
                    <h1>Create Department</h1>
                    <form action="" method="post" id="form">
                        <div><label for="department">Department name</label></div>
                        <div><input type="text" name="department" id="department" required />
                        </div>
                        <div><input type="submit" name="submit" value="Register" id="submit"></div>
                    </form>
                    <p class="message"><?php echo(isset($message) ? $message : "");?></p>
                    <?php }?>
                    <?php
                    $course = new Course();
                    $departments = $course->selectDepartments();
                    ?>
                    <h2>Departments</h2>
                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Department</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php foreach ($departments as $row) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><a href="<?php echo "departments.php?updateId=" . $row['id'] ?>">Update</a></td>
                                    <td><a href="<?php echo "departments.php?deleteId=" . $row['id'] ?>">Delete</a></td>
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