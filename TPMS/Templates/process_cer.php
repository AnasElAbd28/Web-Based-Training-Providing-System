<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['email'])) {
    // Retrieve the user ID from the session
    $userEmail = $_SESSION['email'];
    $getUserIDQuery = "SELECT User_ID FROM user WHERE email = ?";
    $getUserIDStatement = $conn->prepare($getUserIDQuery);
    $getUserIDStatement->bind_param('s', $userEmail);
    $getUserIDStatement->execute();
    $result = $getUserIDStatement->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $userID = $row['User_ID'];

        // Retrieve the course details based on the user ID
        $getUserCourseQuery = "SELECT c.Course_Title, c.Course_Start, c.Course_End, c.Course_Category
                               FROM user_course uc
                               JOIN course c ON uc.Course_ID = c.Course_ID
                               WHERE uc.User_ID = ?";
        $getUserCourseStatement = $conn->prepare($getUserCourseQuery);
        $getUserCourseStatement->bind_param('i', $userID);
        $getUserCourseStatement->execute();
        $userCourseResult = $getUserCourseStatement->get_result();

        if ($userCourseResult->num_rows > 0) {
            // Fetch the course details
            $courseRow = $userCourseResult->fetch_assoc();

            // Generate the certificate content
            $certificate = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Certificate of Completion</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color:#14141b;
                    }
                    .certificate {
                        text-align: center;
                        padding: 20px;
      background-color: rgba(26, 97, 83, 0.267);
                      
                                            }
                    .certificate h2 {
                        color: #fff;
                        font-size: 50px;
                        font-family: \'Righteous\', cursive;
                        margin-bottom: 30px;
                    }
                    .certificate p {
                        font-size: 18px;
                        margin-bottom: 10px;
                        color: #9fa0a4;
                    }
                </style>
            </head>
            <body>
                <div class="certificate">
                    <h2>Certificate of Completion</h2>
                    <p>Thank you for participating in our course and congratulations on your completion!</p>
                    <p>We appreciate your dedication and hard work throughout the course. You have successfully demonstrated your knowledge and skills in the subject matter.</p>
                    <p>We hope that this course has been valuable to you and that you will apply what you have learned in your future endeavors.</p>
                    <p><strong>Name:</strong> ' . $_SESSION['Full_Name'] . '</p>
                    <p><strong>Course:</strong> ' . $courseRow['Course_Title'] . '</p>
                    <p><strong>Course Start:</strong> ' . $courseRow['Course_Start'] . '</p>
                    <p><strong>Course End:</strong> ' . $courseRow['Course_End'] . '</p>
                    <p><strong>Course Category:</strong> ' . $courseRow['Course_Category'] . '</p>
                    <h2> TPMS Team</h2>
                </div>
            </body>
            </html>';

            // Save the certificate as an HTML file
            $filename = "certificate.html";
            file_put_contents($filename, $certificate);

            // Provide download link to the certificate
            echo "<a href='$filename' download>Download Certificate</a>";
        } else {
            // No registered courses found
            echo "No registered courses found.";
        }

        $getUserCourseStatement->close();
    } else {
        // Error retrieving User_ID
        echo "Error retrieving User_ID. Please try again.";
    }

    $getUserIDStatement->close();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
}

$conn->close();
?>
