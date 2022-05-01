<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");

    if (isset($_GET['id'])) $id = $_GET['id'];
    $q = "DELETE FROM movie WHERE id = $id";
    $r = mysqli_query($link, $q);
    if (!$r) {
        die("Database query failed.");
    } else {
        echo "Deleted movie with id $id";
        // link back to admin page
        echo '<br><a href="admin.php">Back to admin page</a>';
    }
    