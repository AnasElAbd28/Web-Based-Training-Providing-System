<?php
session_start();
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected course ID from the form
    $courseID = $_POST['Course_ID'];

    // Retrieve the Instructor_ID based on the instructor's email
    $instructorEmail = $_SESSION['Instructor_email']; // Assuming you have stored the instructor's email in the session
    $getInstructorIDQuery = "SELECT Instructor_ID FROM instructor WHERE Instructor_email = ?";
    $getInstructorIDStatement = $conn->prepare($getInstructorIDQuery);
    $getInstructorIDStatement->bind_param('s', $instructorEmail);
    $getInstructorIDStatement->execute();
    $result = $getInstructorIDStatement->get_result();

    // Check if the Instructor_ID is valid
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $instructorID = $row['Instructor_ID'];

        // Check instructor availability for the selected course
        $checkAvailabilityQuery = "SELECT * FROM instructor_availability WHERE Instructor_ID = ? AND Course_ID = ?";
        $checkAvailabilityStatement = $conn->prepare($checkAvailabilityQuery);
        $checkAvailabilityStatement->bind_param('ii', $instructorID, $courseID);
        $checkAvailabilityStatement->execute();
        $availabilityResult = $checkAvailabilityStatement->get_result();

        if ($availabilityResult->num_rows === 1) {
            // Instructor availability record exists for the selected course

            $availabilityRow = $availabilityResult->fetch_assoc();
            $availability = $availabilityRow['IsAvailable'];

            // Display instructor's current availability status
            echo "Instructor Availability for the selected course: " . $availability;
        } else {
            // No availability record found for the selected course
            echo "No availability record found for the selected course.";
        }

        $checkAvailabilityStatement->close();
    } else {
        // Error retrieving Instructor_ID
        echo "Error retrieving Instructor_ID. Please try again.";
    }

    $getInstructorIDStatement->close();
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: register_course.php");
}

$conn->close();
?>
