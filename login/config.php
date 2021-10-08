<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "phptutorials");

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$conn) {

    echo "<script>alert('unable to connect to database. Check connection string')</script>";
    exit();
} 

// else {
//     echo "Yay, it is connected to database";
// }
