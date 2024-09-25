<?php
    $host = "localhost";
    $username = "kaliya";
    $pass = "kali";
    $dbname = "mycode";

    $conn = new mysqli($host, $username, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connector error". $conn->connect_error);
    }
    else
    {
        echo "success";
    }

?>