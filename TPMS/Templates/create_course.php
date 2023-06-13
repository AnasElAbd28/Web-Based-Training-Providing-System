<?php
include "db_conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $course_img = $_POST["course-img"];
    $course_title = $_POST["course-title"];
    $course_description = $_POST["course-description"];
    $course_price = $_POST["course-price"];
    $course_start = $_POST["start-date"];
    $course_end = $_POST["end-date"];
    $course_category = $_POST["category"];

    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO course (Course_Img, Course_Title, Course_Description, Course_Price, Course_Start, Course_End, Course_Category) VALUES ('$course_img', '$course_title', '$course_description', '$course_price', '$course_start' , '$course_end' , '$course_category')";
    if ($conn->query($sql) === TRUE) {
        header("Location: tp_dashboard.php");
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>