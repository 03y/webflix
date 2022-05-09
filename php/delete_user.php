<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");

    // Get ID from URL.
    if (isset($_GET['user_id'])) $user_id = $_GET['user_id'];
    
    // Delete from database.
    $q = "DELETE FROM users WHERE user_id = $user_id";
    $r = mysqli_query($link, $q);
    if (!$r) {
        die("Database query failed.");
    } else {
        echo "Deleted user with id $user_id";
        // Link back to users page.
        echo '<br><a href="users.php">Back to users page</a>';
    }
    