<?php
    session_start();
    // Check if user is admin.
    if ($_SESSION['user_id'] != 45) {
        // If not admin, show error and stop loading.
        echo '<br><p style="text-align: center;">You do not have permission to view this page.</p>';
        stop();
    }
