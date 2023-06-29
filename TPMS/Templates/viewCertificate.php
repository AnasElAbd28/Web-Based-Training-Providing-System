<?php
// Include the necessary files and start the session
session_start();
include "db_conn.php";

if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
    
    // Retrieve the user's certificates
    $getCertificatesQuery = "SELECT * FROM certificate WHERE User_ID = ?";
    $getCertificatesStatement = $conn->prepare($getCertificatesQuery);
    $getCertificatesStatement->bind_param('i', $userID);
    $getCertificatesStatement->execute();
    $getCertificatesResult = $getCertificatesStatement->get_result();
    
    if ($getCertificatesResult->num_rows > 0) {
        echo "<h1>Your Certificates</h1>";
        while ($row = $getCertificatesResult->fetch_assoc()) {
            $certificateID = $row['Certificate_ID'];
            $courseID = $row['Course_ID'];
            $fullName = $row['Full_Name'];
            $courseTitle = $row['Course_Title'];
            $certificateDate = $row['Certificate_Date'];
            
            echo "<h2>Certificate ID: $certificateID</h2>";
            echo "<p>User ID: $userID</p>";
            echo "<p>User Full Name: $fullName</p>";
            echo "<p>Course ID: $courseID</p>";
            echo "<p>Course Title: $courseTitle</p>";
            echo "<p>Certificate Date: $certificateDate</p>";
            echo "<hr>";
        }
    } else {
        // No certificates found for the user
        echo "<p>No certificates found.</p>";
    }
    
    $getCertificatesStatement->close();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
}

$conn->close();
?>
