<?php
    // We set these flags so that we can see errors, remove if in production.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // The usual HTML setup.
    echo '<!doctype html>';
    echo '<link rel="stylesheet" href="/../../css/style.css">';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">';

    // Show different navigation links depending on if the user is logged in or not.
    if (!isset($_SESSION['user_id'])) {
        include(dirname(__FILE__) . "/../../includes/login.html");
    } else {
        // Admin navigation.
        if ($_SESSION['user_id'] == 45) {
            include(dirname(__FILE__) . "/../../includes/admin_active.html");
        } else {
            include(dirname(__FILE__) . "/../../includes/logout.html");
        }
    }
?>
