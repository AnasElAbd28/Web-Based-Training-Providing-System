<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="stylesheet" href="../Styles/dashboard.css">
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
    session_start();
    if(isset($_SESSION['TP_ID']) && isset($_SESSION['TP_Name'])){
        ?>
            <h1>Hello, <?php echo $_SESSION['TP_Name']; ?></h1>
    <?php }  ?>
        <div id="overview">
            <h2 id="overview-header">Overview</h2>
            <div id="overview-main">
            <div class="overview-section">
                <h3>Students Registered</h3>
                <h4 class="overview-values">200</h4>
            </div>
            <div class="overview-section">
                <h3>Number of courses</h3>
                <h4 class="overview-values">12</h4>
            </div>
            </div>
        </div>
        <div id="Course-Management">
            <h2 id="cm-header">Course Management</h2>
            <div id="buttons-layout">
            <a href="create_course_page.php"><button id="add-course" class="course-btn">Add Course</button></a>
            <button id="delete-course" class="course-btn">Delete Course</button>
            <button id="edit-course" class="course-btn">Edit Course</button>
</div>
        </div>
        
    </main>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
