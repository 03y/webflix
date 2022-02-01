<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';
        include(dirname(__FILE__) . "/../includes/login.html");
    
    # Access session.
    session_start();

    # Redirect if not logged in.
    if (!isset($_SESSION['user_id'])) {
        require('login_tools.php');
        load();
    }

    # Clear existing variables.
    $_SESSION = array();
    # Destroy the session.
    session_destroy();

    # Display body section.
    echo '<h1>Goodbye!</h1><p>You are now logged out.</p><p><a href="login.php">Login</a></p>';

    include(dirname(__FILE__) . "/../includes/footer.html");

?>
