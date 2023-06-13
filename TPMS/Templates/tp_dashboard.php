<?php
    session_start();
    if(isset($_SESSION['TP_ID']) && isset($_SESSION['TP_Name'])){
        ?>
            <h1>Hello, <?php echo $_SESSION['TP_Name']; ?></h1>
    <?php }  ?>
