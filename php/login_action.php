<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include(dirname(__FILE__) . "/../includes/login.html");
    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';

    # Check form submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # Open database connection.
        require('connect_db.php');
        
        # Get connection, load, and validate functions.
        require('login_tools.php');
        
        # Check login.
        list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);
        
        # On success set session data and display logged in page or assign an error message.
        if ($check) {
            # Access session.
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            load('home.php');
        } else {
            // $errors = $data;
            echo "Oops! Something went wrong.";
            echo '<br>Please <a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/php/login.php">try again</a> or <a href="register.php">Register</a></p>';
        }
        # Close database connection.
        mysqli_close($link);
    }
