<!-- database connection -->

<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CSC430Lab4";

    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8mb4");
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit("Error connecting to databse");
    }
?>