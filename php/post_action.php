<?php
    # Access session.
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include(dirname(__FILE__) . "/../includes/logout.html");
    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">';

    # Redirect if not logged in.
    if (!isset($_SESSION['user_id'])) {
        require('login_tools.php');
        load();
    }

    # Check form submitted.
    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
        # Open database connection.
        require('connect_db.php');
        
        # Execute inserting into 'review' database table.
        $q = "INSERT INTO mov_rev(id, first_name, last_name, movie_title, rate, message, post_date)
                VALUES('{$_SESSION["user_id"]}',
                    '{$_SESSION["first_name"]}',
                    '{$_SESSION["last_name"]}',
                    '{$_POST["movie_title"]}',
                    '{$_POST["rate"]}',
                    '{$_POST["message"]}',
                    NOW())
        ";
        
        $r = mysqli_query ( $link, $q ) ;
        # Report error on failure.
        if (mysqli_affected_rows($link) != 1) { 
            echo '<p>Error</p>'.mysqli_error($link);
        } else {
            include('review.php');
        }
        header("Location: review.php");
    }
?>
