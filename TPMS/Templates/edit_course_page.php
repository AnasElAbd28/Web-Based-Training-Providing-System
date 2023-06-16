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
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="stylesheet" href="../Styles/dashboard.css">
    <link rel="stylesheet" href="../Styles/create_course.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Edit</title>
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
                <li><a href="#">My courses</a></li>
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
    $sql = "SELECT * FROM course WHERE Course_ID = '" . $courseID . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    ?>
        <div id="create-course-form">
            <h2 id="create_course_headline">Edit Course</h2>
            <form action="edit_course.php?id=<?php echo $courseID; ?>" method="POST">
    <input type="text" class="input" id="course-img" name="course-img" value="<?php echo $row['Course_Img']; ?>">
    <input type="text" class="input" id="course-title" name="course-title" value="<?php echo $row['Course_Title']; ?>" required>
    <input type="number" class="input" id="course-price" name="course-price" value="<?php echo $row['Course_Price']; ?>" required>
    <textarea class="input" id="course-description" name="course-description" rows="10" cols="50"><?php echo $row['Course_Description']; ?></textarea>
    <input type="date" class="input" id="start-date" name="start-date" value="<?php echo $row['Course_Start']; ?>" required>
    <input type="date" class="input" id="end-date" name="end-date" value="<?php echo $row['Course_End']; ?>" required>
    <select class="input" name="category" id="category">
        <option disabled selected>Category</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Finance">Finance</option>
        <option value="E-Sport">E-Sport</option>
    </select>
    <input type="submit" value="Save" id="submit" />
</form>
        </div>
        
    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>