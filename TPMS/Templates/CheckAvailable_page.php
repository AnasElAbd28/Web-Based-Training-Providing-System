<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/add_availability.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>Check Instructor Availability</title>
</head>
<body>
    <h1>Check Instructor Availability</h1>

    <form method="POST" action="CheckAvailable.php">
        <label for="Course_ID">Select a Course:</label>
        <select name="Course_ID" id="Course_ID">
            <?php
            include "db_conn.php";

            // Retrieve the course options from the database
            $getCoursesQuery = "SELECT Course_ID, Course_Title FROM course";
            $getCoursesResult = $conn->query($getCoursesQuery);

            if ($getCoursesResult->num_rows > 0) {
                while ($row = $getCoursesResult->fetch_assoc()) {
                    $courseID = $row['Course_ID'];
                    $courseName = $row['Course_Title'];
                    echo "<option value='$courseID'>$courseName</option>";
                }
            } else {
                echo "<option value=''>No courses available</option>";
            }

            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" value="Check Availability">
    </form>

</body>
</html>
