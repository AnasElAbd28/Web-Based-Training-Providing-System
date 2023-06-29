<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/3704673904.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" />
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <title>Instructor Landing Page</title>
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
                <li><a href="details_registered.php">My courses</a></li>
                <li><a href="#">Categories</a></li>
               
                <li><a href="instructor_logout.php">Logout</a></li>
                <li><a href="Add_Availability_page.php">Add Availability</a></li>
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
      <div class="space"></div>
        <h1 id="headline">explore courses with no limits.</h1>

        <?php 


        include "db_conn.php";
        session_start();

  if(isset($_SESSION['Instructor_ID']) && isset($_SESSION['Instructor_Name'])){
?>
    <h1>Hello, <?php echo $_SESSION['Instructor_Name']; ?></h1>
    
    <?php 

  }else{
    header("Location: instructor_login_page.php");
    exit();
  }
    ?>
 <div class="scroll-container" data-simplebar>
        <h3 id="pop-cor-headline">popular courses</h3>
        <div class="courses-wrapper" >
    <?php 
    $sql = "SELECT * FROM course"; 
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        ?>
       
          <div class="course">
          <img src="<?php echo $row["Course_Img"]?>" alt="" width="150px">
            <h5 class="course-name"><?php echo $row["Course_Title"] ?></h5> 
            <h5 class="course-price"><?php echo $row["Course_Price"] ?></h5>

        </div>
    <?php  }
  } else {
      echo "No courses found.";
  }
    ?>



              <!-- Add more courses as needed -->
            </div>
     <a href="CheckAvailable_page.php">Check Availability!</a>
          </div>
        <div class="scroll-container" data-simplebar>
            <h3 id="ins-cor-headline">popular Instructors</h3>
            <div class="courses-wrapper" >
              <div class="course">
                <img src="https://scontent-kul2-1.xx.fbcdn.net/v/t1.6435-9/92092328_1736732676468944_3355728076590809088_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=AON9x9hfRzYAX92JOnJ&_nc_ht=scontent-kul2-1.xx&oh=00_AfDhRpIdeAaKMZy-CtvfU128RW0yV-a4tQaWp3Wmg6tKvQ&oe=64995177" alt="" width="150px">
                <h5 class="instructor-name">Iskanth Sathiyaseelan</h5>
              </div>
            <div class="courses-wrapper" >
              <div class="course">
                <img src="https://scontent-kul2-1.xx.fbcdn.net/v/t1.6435-9/92092328_1736732676468944_3355728076590809088_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=AON9x9hfRzYAX92JOnJ&_nc_ht=scontent-kul2-1.xx&oh=00_AfDhRpIdeAaKMZy-CtvfU128RW0yV-a4tQaWp3Wmg6tKvQ&oe=64995177" alt="" width="150px">
                <h5 class="instructor-name">Mohamed Emad</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kut2-2.xx.fbcdn.net/v/t39.30808-6/293349272_2363855850432148_7774657039553821642_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=pIFOoacMTZQAX9CA30E&_nc_ht=scontent-kut2-2.xx&oh=00_AfDJ0BTbJi5J8xu3YRLJdC5zl-fItraLWNnsC4SWt3iNzg&oe=6476FF7B" alt="" width="150px">
                <h5 class="instructor-name">Bode Abdallah</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kul2-1.xx.fbcdn.net/v/t1.6435-9/75446587_795373540916665_6507178094015545344_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=174925&_nc_ohc=FQw1HoNTejEAX8Sx7ER&_nc_ht=scontent-kul2-1.xx&oh=00_AfDFaaOIwi4yPxMED3y1NkioS8vYVILIVDuxhaqu3nPZyw&oe=6499287C" alt="" width="150px">
                <h5 class="instructor-name">Anas Elabd</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kut2-2.xx.fbcdn.net/v/t1.6435-9/145801706_460181118348795_9172438552908238619_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=174925&_nc_ohc=b1fJrT7QzxAAX9L8plD&_nc_ht=scontent-kut2-2.xx&oh=00_AfDvwmSCnu9psN6ZnY2n3xjgx6s4cRqSuWRDBKzrZHsWLw&oe=64992772" alt="" width="150px">
                <h5 class="instructor-name">Ahmad Doma</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kut2-2.xx.fbcdn.net/v/t39.30808-1/294886398_2119617204884553_849711238507000596_n.jpg?stp=dst-jpg_p320x320&_nc_cat=101&ccb=1-7&_nc_sid=7206a8&_nc_ohc=9hpYG911-7gAX_XddLB&_nc_ht=scontent-kut2-2.xx&oh=00_AfCiFPFCg7F5uiKbqBcfC84qtiq5Zr8mq0z0hCXaboZYPA&oe=6475E4E5" alt="" width="150px">
                <h5 class="instructor-name">Omar Mohammed</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kul2-1.xx.fbcdn.net/v/t39.30808-6/307523974_3517434518489626_71210084849487177_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=TsVeYez5yVgAX-Kp6Ln&_nc_ht=scontent-kul2-1.xx&oh=00_AfDG53OflWXnOyy_JbknsGKX7pqLRRCycZa7KiqqfUk_Xw&oe=6476AF5A" alt="" width="150px">
                <h5 class="instructor-name">Fadi Mohamed</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kut2-2.xx.fbcdn.net/v/t39.30808-6/247531391_1069071157229885_1840586772939304331_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=RjL6JGqMawkAX9_Hpcc&_nc_ht=scontent-kut2-2.xx&oh=00_AfD9mWLCjy-vMkCs0y_zHTq4sT5qfWwt39xkg7TQqhW10A&oe=64762975" alt="" width="150px">
                <h5 class="instructor-name">Abdelrahman Tarek</h5>
              </div>
              <div class="course">
                <img src="https://scontent-kul2-1.xx.fbcdn.net/v/t39.30808-6/323876235_708475910912202_6206605209186774581_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=YJEWwNAakIAAX-Mmbgz&_nc_oc=AQl93jvETLWJfVJvJ-FHwbLzl70oG-2uUxK3Ri6zGjSZdIkbQMmL5sjNlN8QxQp2oVnZTGiyhDpT9QVJp9L3Cz69&_nc_ht=scontent-kul2-1.xx&oh=00_AfCV2Bs8dx_fJMd4wfEN2G-nZf-qmt4JfUyjmNBBfhocgw&oe=64771DB7" alt="">
                <h5 class="instructor-name">Abdelrahman Tarek</h5>
              </div>
             
              <!-- Add more courses as needed -->
            </div>
          </div>
    </main>

</div>
    <footer>

    </footer>

    <script src="../Javascript/app.js"></script>
    <script src="../Javascript/landing.js"></script>
</body>
</html>
