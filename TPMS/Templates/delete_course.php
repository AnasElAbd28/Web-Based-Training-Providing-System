<?php
$confirmed = isset($_GET['confirm']) && $_GET['confirm'] === 'true';
include 'db_conn.php';

if ($confirmed) {
    // Retrieve the course ID from the URL
    $courseId = $_GET['id'];

    // Delete the course from the database
    $sql = "DELETE FROM course WHERE Course_ID = $courseId";
    $result = mysqli_query($conn, $sql);

    echo $result;

    if ($result) {
        // Course deleted successfully
        header("Location: view_course_delete_page.php");
       exit();
    } else {
        // Failed to delete the course
        echo "Error deleting course: " . mysqli_error($conn);
    }
} else {
    // User did not confirm the deletion, redirect back to the course listing page
    header("Location: view_course_delete_page.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>