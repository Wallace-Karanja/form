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
                <form action="" method="get" id="form">
                    <div></div>
                    <div><label for="course">Course Title:</label></div>
                    <div><input type="text" name="course" id="course"></div>
                    <div><label for="department">Department:</label></div>
                    <div><input type="text" name="department" id="department"></div>
                    <div><input type="submit" name="submit" id="submit" value="Search"></div>
                </form>
                <?php
                if (isset($_GET['submit'])) {
                    $course = new Course('courses_view');
                    $courses = $course->searchCourse();
                }
                ?>
                <div id="output"></div>
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
                        <?php ?>
                        <?php if ($courses != false) {
                            foreach ($courses as $key => $row) { ?>
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
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div>
        </main>
        <div></div>
    </div>
    <script>
        // var courseInput = document.getElementById("course");
        // courseInput.addEventListener("input", (event) => {
        //     course = courseInput.value;
        //     fetch('search_request.php?course=' + course + '&department=' + '')
        //         .then(response => {
        //             // Check if the response is ok
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             // Parse the JSON response
        //             return response.json();
        //         })
        //         .then(data => {
        //             // Update the output div with the response data
        //             document.getElementById('output').innerHTML = JSON.stringify(data);
        //         })
        //         .catch(error => {
        //             console.error('There was a problem with the fetch operation:', error);
        //         });
        // })

        var courseInput = document.getElementById("course");
        var departmentInput = document.getElementById("department");

        function updateUrl() {
            var courseInputValue = courseInput.value.trim();
            var departmentInputValue = departmentInput.value.trim();
            var url = "search_request.php?course=" + courseInputValue + "&department=" + departmentInputValue;
            console.log(url);
            fetch(url)
                .then(response => {
                    if (!response.ok) { // Check if the response is ok
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse the JSON response
                })
                .then(data => {
                    // Update the output div with the response data
                    document.getElementById('output').innerHTML = JSON.stringify(data);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        courseInput.addEventListener("input", updateUrl);
        departmentInput.addEventListener("input", updateUrl);
    </script>
</body>

</html>