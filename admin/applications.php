<?php
session_start();
include '../applicant/Form.php';
include './Admin.php';
include '../applicant/Applicant.php';
include '../applicant/Application.php';
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
        <link rel="stylesheet" href="../applicant/styles.css">
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
                    <h1>List of Applications</h1>
                    <form action="" method="get" style="margin-bottom: 10px; ">
                        <label for="Name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="lastname">
                        <label for="Id/Phone">ID or Phone Number:</label>
                        <input type="text" name="id_number" id="id_number" placeholder="ID or Phone number">
                        <input type="submit" name="submit" value="Search">
                    </form>
                    <?php
                    if (isset($_GET)) {
                        $applications = new Application();
                        $search = $applications->searchApplications();
                        if (!empty($search)) {
                            echo "search yielded results";
                        }
                    }
                    ?>
                    <table style="margin: 0;">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Phone Number</th>
                            <th>Application</th>
                            <th>Submitted</th>
                            <th>Admitted</th>
                            <th>Applicant Decision</th>
                            <th>Adm no</th>
                        </thead>
                        <tbody>
                            <?php
                            $applications = new Application();
                            $allApplications = $applications->selectAllApplications();
                            foreach ($allApplications as $row) { ?>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['firstname'] . " " . $row['second_name'] . " " . $row['lastname']; ?>
                                </td>
                                <td><?php echo $row['id_number']; ?></td>
                                <td><?php echo $row['phone_number']; ?></td>
                                <td><a href="view.php?id=<?php echo $row['id']; ?>">View</a></td>
                                <td><?php echo ($row['submitted'] ? "Yes" : "No"); ?></td>
                                <td><?php echo ($row['admitted'] ? "Yes" : "Declined"); ?></td>
                                <td><?php echo ($row['applicant_decision'] ?? "Not available"); ?></td>
                                <td><?php echo ($row['applicant_decision'] == "ACCEPT" ? $row['admission_number'] : ""); ?>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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