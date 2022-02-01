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
    $page_title = 'Whats on';

    # Open database connection.
    require('connect_db.php');

    # Retrieve movies from 'movie' database table.
    $q = "SELECT * FROM movie";
    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        # Display body section.
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            // echo '<br><br><br>' . 'http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/' . $row['img'] . '<br><br><br>';
            echo '
            <a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/php/movie.php?id=' . $row['id'] . '">
            <img border="0" alt="Book Now" src=\'http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/' . $row['img'] . '\'">
            </a>
                
                <h1>' . $row['movie_title'] . '</h1>
                <a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/php/movie.php?id=' . $row['id'] . '">Book Now</a>
                <br><br><br>';
        }

        # Close database connection.
        mysqli_close($link);
    } else {
        echo '<p>There are currently no movies showing.</p>';
    }

    # Display body section.
    #echo "<h1>What's On</h1><p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </p>";

    # Display footer section.
    include(dirname(__FILE__) . "/../includes/footer.html");
