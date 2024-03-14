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
            <li class="links"><a href="">Logout</a></li>
          </div>
        </ul>
      </nav>
    </div>
  </div>
  <div class="container">
    <div></div>
    <main>
      <div>
        <h1>List of Applications</h1>
        <table>
          <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Application</th>
          </thead>
          <tbody>
            <?php
            $applications = new Form();
            foreach ($applications->selectAll() as $row) { ?>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
              <td><?php echo $row['email_address']; ?></td>
              <td><?php echo $row['phone_number']; ?></td>
              <td><a href="view.php?id=<?php echo $row['id']; ?>">View</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <div style="border: 2px dashed black;">
          <h3>Logs</h3>
          <ol>
            <?php
            // foreach ($applications->showLogs() as $row) { 
            ?>
            <!-- <li><?php // echo $row['name'] . ' ' . $row['date'] . ' ' . $row['time']; 
                      ?></li> -->
            <?php //} 
            ?>
          </ol>
          <?php
          var_dump($applications->showLogs());
          ?>
        </div>
    </main>
    <div></div>
  </div>

</body>

</html>