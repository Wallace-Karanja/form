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
            <div>
                <style>
                    .container {
                        grid-template-columns: 2fr 2fr 2fr;
                    }
                </style>

                <?php
                $admin = new Admin();
                if (isset($_GET['id']) && $admin->selectIntakeById()) {
                    $intake = $admin->selectIntakeById()[0];
                    ?>
                    <h1>Update intake period</h1>
                    <form action="" method="post" id="form">
                        <input type="hidden" name="id" value="<?php echo $intake['id']; ?>">
                        <div>
                            <label for="start_date">Start date</label>
                        </div>
                        <div>
                            <input type="date" name="start_date" id="start_date"
                                value="<?php echo $intake['start_date'] ?? null; ?>" required>
                        </div>
                        <div>
                            <label for="end_date">End date</label>
                        </div>
                        <div>
                            <input type="date" name="end_date" id="start_date"
                                value="<?php echo $intake['end_date'] ?? null; ?>" required>
                        </div>
                        <div>
                            <label for="intake">Intake</label>
                        </div>
                        <div>
                            <input type="text" name="intake" id="" placeholder="e.g. SEPTEMBER 2024"
                                value="<?php echo $intake['intake'] ?? null; ?>" required>
                        </div>
                        <div>
                            <label for="active">Active</label>
                        </div>
                        <div>
                            <select name="active" id="active">
                                <option value="<?php echo $intake['active'] ?>"><?php echo $intake['active']; ?></option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div><input type="submit" name="update" value="Update Period" id="submit"></div>
                    </form>
                <?php } else { ?>
                    <h1>Set intake period</h1>
                    <form action="" method="post" id="form">
                        <div>
                            <label for="start_date">Start date</label>
                        </div>
                        <div>
                            <input type="date" name="start_date" id="start_date"
                                value="<?php echo $_POST['start_date'] ?? null; ?>" required>
                        </div>
                        <div>
                            <label for="end_date">End date</label>
                        </div>
                        <div>
                            <input type="date" name="end_date" id="start_date"
                                value="<?php echo $_POST['end_date'] ?? null; ?>" required>
                        </div>
                        <div>
                            <label for="intake">Intake</label>
                        </div>
                        <div>
                            <input type="text" name="intake" id="" placeholder="e.g. SEPTEMBER 2024"
                                value="<?php echo $_POST['intake'] ?? null; ?>" required>
                        </div>
                        <div>
                            <label for="active">Active</label>
                        </div>
                        <div>
                            <select name="active" id="active">
                                <option value="0">--select an option--</option>
                                <option value="YES">YES</option>
                                <option value="No">NO</option>
                            </select>
                        </div>
                        <div><input type="submit" name="submit" value="Set Period" id="submit"></div>
                    </form>
                <?php } ?>
                <?php
                $admin = new Admin();

                if (isset($_POST['submit'])) {
                    $admin = new Admin();
                    if ($admin->setIntakePeriod()) {
                        echo "Intake period set successifully";
                        refresh($_SERVER['PHP_SELF'], 3);
                    }
                }

                if (isset($_POST['update'])) {
                    $admin = new Admin();
                    if ($admin->updateIntakePeriod()) {
                        echo "Intake period updated successifully";
                        refresh($_SERVER['PHP_SELF'], 3);
                    }
                }
                ?>
                <div>
                    <?php $admin = new Admin();
                    $intakes = $admin->displayAllIntakes();
                    ?>
                    <h2>Intakes</h2>
                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Intake</th>
                            <th>Active</th>
                            <th>Update Dates</th>
                        </thead>
                        <tbody>
                            <?php foreach ($intakes as $intake) { ?>
                                <tr>
                                    <td><?php echo $intake['id']; ?></td>
                                    <td><?php echo date("F j, Y", strtotime($intake['start_date'])); ?></td>
                                    <td><?php echo date("F j, Y", strtotime($intake['end_date'])); ?></td>
                                    <td><?php echo $intake['intake']; ?></td>
                                    <td><?php echo $intake['active'] ?? '...'; ?></td>
                                    <td><a href="intake.php?id=<?php echo $intake['id']; ?>">Update</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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