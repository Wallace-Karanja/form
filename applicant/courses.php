<?php
require '../admin/Course.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/application_styles.css">
  </style>
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
            <li class="links"><a href="application.php">My Application</a></li>
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
      <h1>Course Catalogue</h1>
      <div>
        <?php
        $course = new Course("courses_view", ""); // select from a view
        $courses = $course->selectAll("department"); // order by dpt
        ?>
        <table>
          <thead>
            <th></th>
            <th>Course</th>
            <th>Department</th>
            <th>Level</th>
            <th>Exam Body</th>
            <th>Duration</th>
            <th>Requirement</th>
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
                <td class="apply"><button><a href="<?php echo "requirement.php?id=" . $row['id']; ?>">Requirements/Details</a></button></td>
                <td class="apply"><button><a href="<?php echo "login.php?id=" . $row['id']; ?>">Apply</a></button></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div>
    </main>
    <div></div>
  </div>

</body>

</html>