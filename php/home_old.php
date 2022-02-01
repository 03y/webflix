<?php # DISPLAY COMPLETE LOGGED IN PAGE.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';

    # Access session.
    session_start();
    
    # Redirect if not logged in.
    if (!isset($_SESSION['user_id'])) {
        require('login_tools.php');
        load();
    }

    # Set page title and display header section.
    $page_title = "Home";
    include(dirname(__FILE__) . "/../includes/logout.html");

    
    # Display body section.
    echo "<h1>HOME</h1><p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </p>";
    echo '<p><a href="logout.php">Logout</a></p>';

    # Display footer section.
    include(dirname(__FILE__) . "/../includes/footer.html");

