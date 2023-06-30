<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <title>Register course</title>
</head>
<body>
<?php
include "db_conn.php";
session_start();
$query = "SELECT Course_ID, Course_Title FROM course";
$result = $conn->query($query);
?>
<nav>
    <a href="#">
        <h2>TPMS</h2>
    </a>
    <div>
        <ul class="nav-links">
            <li><a href="#">About us</a></li>
            <li><a href="#">services</a></li>
            <li><a href="#">Contact us</a></li>
                       <li><a href="Register.php">sign up</a></li>
        </ul>
    </div>


    <div class="burger">
        <div class="l1"></div>
        <div class="l2"></div>
        <div class="l3"></div>

    </div>
</nav>
<div class="all-content">
    <section id="text-sec">
        <p id="login-text">Register Course</p>
        <p id="promotion">Access many of our courses taught by the best instructors</p>
    </section>
    <main>
        <div id="main-content">

            <section id="form-sec">
                <form action="process_reg_course.php" method="POST">
                    <label for="courses">Courses:</label>
                       <select name="Course_ID" id="courses">
<?php

while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['Course_ID'] . '">' . $row['Course_Title'] . '</option>';
}

?>
                       </select>
                    <input type="submit"  value="Register!" id="submit" />
                    <p id="signup">Return to main page <a href="landing.php">main page</a></p>
                </form>
            </section>
        </div>
        <div id="logo">
            <h2 id="logo-header">Pygmalion</h2>
            <p id="motto">We Strive for Excellence</p>
        </div>
    </main>
</div>
<footer>

</footer>

<script src="../Javascript/app.js"></script>
</body>
</html>




