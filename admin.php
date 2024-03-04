<?php 
  include './Form.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
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
              <li class="links"><a href="">About</a></li>
            </div>
            <div>
              <li class="links"><a href="admin.php">Admin</a></li>
            </div>
          </ul>
        </nav>
      </div>
    </div>
    <div class="container">
      <div></div>
        <main>
          <h1>List of Applications</h1>
          <div>
            <h2>Table of applications</h2>
            <table>
              <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
              </thead>
            <tbody>
            <?php 
              $applications = new Form();
              foreach ($applications->selectAll() as $row) { ?>
                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['firstname'] . " ". $row['lastname'] ;?></td> 
                  <td><?php echo $row['email_address'];?></td>
                  <td><?php echo $row['phone_number'];?></td> 
                </tr>
              <?php } ?>
            </tbody>
            </table>
        </main>
      <div></div>
    </div>
    
  </body>
</html>
