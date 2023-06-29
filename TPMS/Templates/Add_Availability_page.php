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
    <title>Add Instructor Availability</title>
</head>
<body>
    <h1>Add Instructor Availability</h1>

    <form method="POST" action="Add_Availability.php">
        <label for="Course_ID">Select a Course:</label>
        <select name="Course_ID" id="Course_ID">
            <!-- Populate the course options dynamically from the database -->
            <?php
            include "db_conn.php";
            $getCoursesQuery = "SELECT Course_ID, Course_Title FROM course";
            $getCoursesResult = $conn->query($getCoursesQuery);

            if ($getCoursesResult->num_rows > 0) {
                while ($row = $getCoursesResult->fetch_assoc()) {
                    $courseID = $row['Course_ID'];
                    $courseName = $row['Course_Title'];
                    echo "<option value='$courseID'>$courseName</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <label for="Availability">Availability:</label>
        <select name="Availability" id="Availability">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br><br>
        <input type="submit" value="Add Availability">
    </form>

</body>
</html>
