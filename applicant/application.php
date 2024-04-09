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
          <li><a href="course.php<?php echo (isset($_GET['courseId']) ? '?courseId=' . $_GET['courseId'] : '') ?>">Select Course</a></li>
          <li><a href="demographics.php">Demographic Information</a></li>
          <li><a href="demographics.php">Parent/Guardian Information</a></li>
          <li><a href="upload.php">Upload Documents</a></li>
        </ul>
      </nav>
    </div>
    <main>
      <h1>Application</h1>
      <h2>Personal information</h2>
      <div>
        <?php
        $record = $applicantInformation->selectApplicantByPhoneNumber($_SESSION['id']);
        ?>
        <form action="" method="post" id="form">
          <?php foreach ($record as $row) { ?>
            <input type="hidden" name="applicant_id" value="<?php echo $row['id'] ?>">
            <div>
              <label for="firstName">Firstname<span id="firstname"></span></label>
              <input type="text" name="firstname" id="firstName" value="<?php echo (isset($row['firstname']) ? $row['firstname'] : ""); ?>" required />
            </div>
            <div>
              <label for="lastName">Lastname <span id="lastname"></span></label>
              <input type="text" name="lastname" id="lastName" value="<?php echo (isset($row['lastname']) ? $row['lastname'] : ""); ?>" required />
            </div>
            <div>
              <label for="secondName">Second name <span id="second_name"></span></label>
              <input type="text" name="second_name" id="secondName" value="<?php echo (isset($row['second_name']) ? $row['second_name'] : ""); ?>" required />
            </div>
            <div>
              <label for="gender">Gender</label>
              <select name="gender" id="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>
            <div>
              <label for="birthday">Date of Birth</label>
              <input type="date" name="birthday" id="birthday" required>
            </div>
            <div>
              <label for="emailAddress">Email<span id="email_address"></span></label>
              <input type="email" name="email_address" id="emailAddress" value="<?php echo (isset($row['email_address']) ? $row['email_address'] : ""); ?>" required />
            </div>
            <div>
              <label for="phoneNumber">Phone<span id="phone_number"></span></label>
              <input type="tel" name="phone_number" id="phoneNumber" value="<?php echo (isset($row['phone_number']) ? $row['phone_number'] : ""); ?>" required />
            </div>
            <div>
              <label for="alternativePhoneNumber">Alternative Phone<span id="alternative_phone"></span></label>
              <input type="tel" name="alternative_phone" id="alternativePhoneNumber" value="<?php echo (isset($row['alternative_phone']) ? $row['alternative_phone'] : ""); ?>" required />
            </div>
            <div><input type="submit" name="submit" value="save" id="submit" /></div>
          <?php } ?>
        </form>
        <p id="message"></p>
        <?php
        if (isset($_POST["submit"])) {
          $table = "personal_information";
          $columns = "applicant_id, firstname, lastname, second_name, gender, birthday, email_address, phone_number, alternative_phone";
          $parameters = ":applicant_id, :firstname, :lastname, :second_name, :gender, :birthday, :email_address, :phone_number, :alternative_phone";
          $personalInformation = new Applicant($table, $columns, $parameters);
          var_dump($personalInformation->save());
        }
        ?>

        <?php
        $info = new Applicant($table = "personal_information");
        ?>
      </div>
    </main>
    <div></div>
  </div>

</body>

</html>