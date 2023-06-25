<?php
session_start();
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected course ID from the form
    $courseID = $_POST['Course_ID'];

    // Retrieve the User_ID based on the user's email
    $userEmail = $_SESSION['email']; // Assuming you have stored the user's email in the session
    $getUserIDQuery = "SELECT User_ID FROM user WHERE email = ?";
    $getUserIDStatement = $conn->prepare($getUserIDQuery);
    $getUserIDStatement->bind_param('s', $userEmail);
    $getUserIDStatement->execute();
    $result = $getUserIDStatement->get_result();

    // Check if the User_ID is valid
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $userID = $row['User_ID'];

        // Prepare and execute the query to insert the user's course selection into the user_course table
        $insertCourseQuery = "INSERT INTO user_course (User_ID, Course_ID) VALUES (?, ?)";
        $insertCourseStatement = $conn->prepare($insertCourseQuery);
        $insertCourseStatement->bind_param('ii', $userID, $courseID);

        if ($insertCourseStatement->execute()) {
            // Course registration successful
            echo "Course registration successful!";
            header("Location: details_registered.php");
        } else {
            // Error occurred during course registration
            echo "Error registering the course. Please try again.";
        }

        $insertCourseStatement->close();
    } else {
        // Error retrieving User_ID
        echo "Error retrieving User_ID. Please try again.";
    }

    $getUserIDStatement->close();
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: register_course.php");
}

$conn->close();
?>
