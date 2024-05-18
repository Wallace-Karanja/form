<?php
include_once '../admin/Course.php';
$column = "id, course, department, level, exam_body, duration, requirement, description";
$course = new Course('courses_view', $column);
$courses = $course->searchCourse();
echo json_encode($courses);
