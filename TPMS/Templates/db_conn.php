<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'Anas');
define('DB_PASS', '123456');
define('DB_NAME', 'Training_System');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error){
    die('connection failed') . $conn->connect_error;
}

echo 'CONNECTED';

?>