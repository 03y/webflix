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

    require('connect_db.php');

    if (isset($_GET['post_id'])) $post_id = $_GET['post_id'];
    
    $sql = "DELETE FROM mov_rev WHERE post_id='$post_id'";
    if ($link->query($sql) === TRUE) {
        header("Location: my_reviews.php");
    } else {
        echo "Error deleting record: " . $link -> error;
    }
