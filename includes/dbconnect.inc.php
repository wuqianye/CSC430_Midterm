<!-- database connection -->

<?php
    error_reporting(0);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CSC430Lab4";

    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8mb4");
        // echo "Database Connected!";
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit("Error connecting to databse");
    }
?>