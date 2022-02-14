<?php
    $link = mysqli_connect("localhost", "root", "", "webflix");
    if (!$link) {
        die("Couldn't establish connection with MySQL");
    } else {
        // echo "Established connection with MySQL";
    }
?>