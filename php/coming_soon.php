<?php
    # Access session.
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';
    include(dirname(__FILE__) . "/../includes/logout.html");

    # Redirect if not logged in.
    if (!isset($_SESSION['user_id'])) {
        require('login_tools.php');
        load();
    }

    # Set page title and display header section.
    $page_title = "Coming soon";

    echo "<h1>Coming soon</h1>";
    echo "<br><br>";

    echo "<img width=\"183px\" src=\"http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/arthur_xmas.jpg\" alt=\"popcorn\" width=\"100em\">";
    echo "<h1>Arthur Christmas</h1>";

    # Display footer section.
    include(dirname(__FILE__) . "/../includes/footer.html");
