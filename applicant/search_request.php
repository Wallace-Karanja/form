<?php
if (isset($_GET['submit'])) {
    $course = new Course('courses_view');
    $courses = $course->searchCourse();
    echo json_encode($courses);
}
