<?php
session_start();
include 'db_conn.php';

$courseID = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/course_style.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Landing Page</title>
</head>
<body>
    <nav>
        <a href="#">
            <h2>Pygmalion</h2>
        </a>
        <div>
            <input class="search" type="text" name="" id="">
            <i class="fa-solid fa-magnifying-glass" style="color: #f1f2f4;"></i>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="tp_view_course_page.php">My courses</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            
        </div>
        
        <div class="burger">
            <div class="l1"></div>
            <div class="l2"></div>
            <div class="l3"></div>
            
        </div>
    </nav>
    <div class="all-content">
    <main>
        
        <?php
    $sql = "SELECT * FROM course WHERE Course_ID ='" . $courseID . "'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        ?>
            <div id="pictitle">
            <img src="<?php echo $row["Course_Img"]?>" alt="" width="150px">
            <h2><?php echo $row["Course_Title"]  ?></h2>
        </div>
        <div id="additional">
            <div class="description">
                <h3>Description: </h3>
                <p><?php echo $row["Course_Description"] ?></p>
            </div>

            
        </div>
        <div id="instruct">
            <h3>Instructors</h3>
            <?php
            $sql = "SELECT i.Instructor_Name
            FROM instructor i
            WHERE i.Instructor_ID IN (
                SELECT ci.Instructor_ID
                FROM course_instructor ci
                WHERE ci.Course_ID = $courseID
            )";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo  $row["Instructor_Name"] . "<br>";
        }
    } else {
        echo "No instructors found for the given course ID.";
    }
    
    // Close the connection
    $conn->close();
    ?>
        </div>
       
 
    <?php  }
  } else {
      echo "No courses found.";
  }
    ?>

    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
