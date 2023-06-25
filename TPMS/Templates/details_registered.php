<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/my_courses.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
    <script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>My courses</title>
</head>
<body>
<nav>
    <a href="#">
        <h2>Pygmalion</h2>
    </a>
    <div>
<!--        <input class="search" type="text" name="" id="">-->
<!--        <i class="fa-solid fa-magnifying-glass" style="color: #f1f2f4;"></i>-->
    </div>
    <div>
        <ul class="nav-links">
            <li><a href="details_registered.php">My courses</a></li>
            <li><a href="#">Categories</a></li>

            <li><a href="logout.php">Logout</a></li>
            <li><a href="#">profile</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart" style="color: #fcfcfd;"></i></a></li>
        </ul>

    </div>
    <div class="burger">
        <div class="l1"></div>
        <div class="l2"></div>
        <div class="l3"></div>

    </div>
</nav>



<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];
    $getUserIDQuery = "SELECT User_ID FROM user WHERE email = ?";
    $getUserIDStatement = $conn->prepare($getUserIDQuery);
    $getUserIDStatement->bind_param('s', $userEmail);
    $getUserIDStatement->execute();
    $result = $getUserIDStatement->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $userID = $row['User_ID'];

        $getUserCourseQuery = "SELECT c.Course_Img, c.Course_Title, c.Course_Description, c.Course_Start, c.Course_End, c.Course_Price, c.Course_Category
                               FROM user_course uc
                               JOIN course c ON uc.Course_ID = c.Course_ID
                               WHERE uc.User_ID = ?";
        $getUserCourseStatement = $conn->prepare($getUserCourseQuery);
        $getUserCourseStatement->bind_param('i', $userID);
        $getUserCourseStatement->execute();
        $userCourseResult = $getUserCourseStatement->get_result();

        if ($userCourseResult->num_rows > 0) {
            // Display the details of the registered courses
            ?>
            <div class="scroll-container" data-simplebar>
                <div class="courses-wrapper">
                    <?php
                    while ($courseRow = $userCourseResult->fetch_assoc()) {
                        ?>
                        <div class="display">
                            <img src="<?php echo $courseRow['Course_Img']; ?>" alt="" width="150px">
                            <h2><?php echo $courseRow['Course_Title']; ?></h2>
                            <p><strong>Description:</strong> <?php echo $courseRow['Course_Description']; ?></p>
                            <p><strong>Course Start:</strong> <?php echo $courseRow['Course_Start']; ?></p>
                            <p><strong>Course End:</strong> <?php echo $courseRow['Course_End']; ?></p>
                            <p><strong>Course Price:</strong> <?php echo $courseRow['Course_Price']; ?></p>
                            <p><strong>Course Category:</strong> <?php echo $courseRow['Course_Category']; ?></p>
                            <hr>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <?php
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

</body>
</html>
