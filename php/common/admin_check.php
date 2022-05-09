<?php
    session_start();
    // check if admin
    if ($_SESSION['user_id'] != 45) {
        echo '<br><p style="text-align: center;">You do not have permission to view this page.</p>';
        stop();
    }
