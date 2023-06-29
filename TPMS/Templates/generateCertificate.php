<?php
// Include the necessary files and start the session
session_start();
include "db_conn.php";

if (isset($_SESSION['User_ID'])) {
    $userID = $_SESSION['User_ID'];
    $courseID = $_POST['Course_ID'];
    $certificateDate = date('Y-m-d');
    
    // Retrieve the user's full name and the course title
    $getUserQuery = "SELECT Full_Name FROM user WHERE User_ID = ?";
    $getUserStatement = $conn->prepare($getUserQuery);
    $getUserStatement->bind_param('i', $userID);
    $getUserStatement->execute();
    $getUserResult = $getUserStatement->get_result();
    
    $getCourseQuery = "SELECT Course_Title FROM course WHERE Course_ID = ?";
    $getCourseStatement = $conn->prepare($getCourseQuery);
    $getCourseStatement->bind_param('i', $courseID);
    $getCourseStatement->execute();
    $getCourseResult = $getCourseStatement->get_result();
    
    if ($getUserResult->num_rows === 1 && $getCourseResult->num_rows === 1) {
        $userRow = $getUserResult->fetch_assoc();
        $courseRow = $getCourseResult->fetch_assoc();
        $fullName = $userRow['Full_Name'];
        $courseTitle = $courseRow['Course_Title'];
        
        // Generate a unique certificate ID
        $certificateID = generateCertificateID();
        
        // Insert the certificate data into the database
        $insertCertificateQuery = "INSERT INTO certificate (Certificate_ID, User_ID, Course_ID, Full_Name, Course_Title, Certificate_Date)
                                   VALUES (?, ?, ?, ?, ?, ?)";
        $insertCertificateStatement = $conn->prepare($insertCertificateQuery);
        $insertCertificateStatement->bind_param('iiisss', $certificateID, $userID, $courseID, $fullName, $courseTitle, $certificateDate);
        $insertCertificateStatement->execute();
        
        // Display the generated certificate
        echo "<h1>Certificate</h1>";
        echo "<p>Certificate ID: $certificateID</p>";
        echo "<p>User ID: $userID</p>";
        echo "<p>User Full Name: $fullName</p>";
        echo "<p>Course ID: $courseID</p>";
        echo "<p>Course Title: $courseTitle</p>";
        echo "<p>Certificate Date: $certificateDate</p>";
        
        $insertCertificateStatement->close();
    } else {
        // Error retrieving user or course data
        echo "Error retrieving user or course data. Please try again.";
    }
    
    $getUserStatement->close();
    $getCourseStatement->close();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
}

$conn->close();

function generateCertificateID() {
    // Generate a unique certificate ID using a suitable algorithm (e.g., UUID)
    // You can implement your own function or use a library for generating unique IDs
    // Here's an example using the uniqid() function:
    $certificateID = uniqid();
    return uniqid();
}
?>
