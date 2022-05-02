<?php
    session_start();
    // check if admin
    if ($_SESSION['user_id'] == 45) {
        echo 'admin view active!
        <a class="nav-link" href="../php/admin.php" id="home">manage movies</a>
        <a class="nav-link" href="../php/users.php" id="my_reviews">manage users</a>';
    } else {
        echo '<br><p style="text-align: center;">You do not have permission to view this page.</p>';
        stop();
    }

