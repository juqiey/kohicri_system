<?php
//set default timezone
date_default_timezone_set("Asia/Kuala_Lumpur");
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'kohicri');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function db() {
    static $conn;
    if ($conn===NULL) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    }
    return $conn;
}
?>
