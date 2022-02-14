<?php
    require(dirname(__FILE__) . "/common/head.php");
    
    // Check form submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require(dirname(__FILE__) . "/common/connect_db.php");
        require(dirname(__FILE__) . "/common/login_tools.php");
        
        // Check login.
        list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);
        
        if ($check) {
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            load('home.php');
        } else {
            echo "Oops! Something went wrong.";
            echo '<br>Please <a href="./login.php">try again</a> or <a href="register.php">Register</a></p>';
        }
        mysqli_close($link);
    }
