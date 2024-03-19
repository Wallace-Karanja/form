<?php
session_start();
include './Applicant.php';
if (!isset($_SESSION['id'])) {
  $url = './login.php';
  header("Location:" . $url);
}
// generate applicant information
$applicantInformation = new Applicant();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css">
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
            <li class="links"><a href="">About</a></li>
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
      <h1>Application Form</h1>
      <div>
        <?php
        $record = $applicantInformation->selectApplicantByPhoneNumber($_SESSION['id']);
        ?>
        <form action="" method="post" id="form">
          <?php foreach ($record as $row) { ?>
            <div>
              <label for="firstName">Firstname<span id="firstname"></span></label>
              <input type="text" name="firstname" id="firstName" value="<?php echo (isset($row['firstname']) ? $row['firstname'] : ""); ?>" required />
            </div>
            <div>
              <label for="lastName">Lastname <span id="lastname"></span></label>
              <input type="text" name="lastname" id="lastName" value="<?php echo (isset($row['lastname']) ? $row['lastname'] : ""); ?>" required />
            </div>
            <div>
              <label for="emailAddress">Email<span id="email_address"></span></label>
              <input type="email" name="email_address" id="emailAddress" value="<?php echo (isset($row['email_address']) ? $row['email_address'] : ""); ?>" required />
            </div>
            <div>
              <label for="phoneNumber">Phone<span id="phone_number"></span></label>
              <input type="tel" name="phone_number" id="phoneNumber" value="<?php echo (isset($row['phone_number']) ? $row['phone_number'] : ""); ?>" required />
            </div>
            <div><input type="submit" name="submit" value="submit" id="submit" /></div>
          <?php } ?>
        </form>
        <p id="message"></p>
        <?php
        // if (isset($_POST['submit'])) {
        //   $form = new Form();
        //   var_dump($form->createLog($_POST));
        // }
        ?>
      </div>
    </main>
    <div></div>
  </div>

</body>

</html>