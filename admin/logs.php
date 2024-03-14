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
        <main>
            <div>
                <h1>Logs</h1>
                <ol>
                    <?php
                    $applications = new Form();
                    if (empty($applications->showLogs())) { ?>
                        <li>No records yet !</li>
                        <?php } else {
                        foreach ($applications->showLogs() as $row) {
                        ?>
                            <li><?php echo $row['name'] . ' ' . $row['date'] . ' ' . $row['time'];
                                ?></li>
                    <?php }
                    }
                    ?>
                </ol>
            </div>
        </main>
        <div></div>
    </div>

</body>

</html>