<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $username = "HNDSOFTSA22";
    $password = "tqCgDdP7yZ";

    $link = mysqli_connect("localhost", $username, $password, $username);

    if (!$link) {
        die("Couldn't establish connection with MySQL");
    } else {
        // echo "Established connection with MySQL";
    }
?>