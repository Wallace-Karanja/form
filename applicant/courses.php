<?php
require '../admin/Course.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/styles.css">
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
            <li class="links"><a href="#">About</a></li>
          </div>
          <div>
            <li class="links"><a href="#">Contact Us</a></li>
          </div>
        </ul>
      </nav>
    </div>
  </div>
  <div class="container">
    <div></div>
    <main>
      <h1>Course Catalogue</h1>
      <div>
        <?php
        $course = new Course("courses_view", ""); // select from a view
        $courses = $course->selectAll();
        ?>
        <table>
          <thead>
            <th></th>
            <th>Course</th>
            <th>Department</th>
            <th>Level</th>
            <th>Exam Body</th>
            <th>Duration</th>
            <th>Apply</th>
          </thead>
          <tbody>
            <?php foreach ($courses as $key => $row) { ?>
              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['level']; ?></td>
                <td><?php echo $row['exam_body']; ?></td>
                <td><?php echo $row['duration']; ?></td>
                <td><a href="<?php echo "apply.php?id=" . $row['id']; ?>">Apply</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
    <div></div>
  </div>

</body>

</html>