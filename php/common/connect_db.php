<?php
    // Connection with MySQL.
    $link = mysqli_connect("localhost", "root", "", "webflix");
    if (!$link) {
        // Error if connection failed.
        die("Couldn't establish connection with MySQL");
    }
?>