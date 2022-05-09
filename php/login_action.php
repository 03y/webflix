<?php
    require(dirname(__FILE__) . "/common/head.php");
    
    $page_title = 'Login';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // Check form submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require(dirname(__FILE__) . "/common/connect_db.php");
        require(dirname(__FILE__) . "/common/login_tools.php");
        
        // Check login.
        list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);
        
        if ($check) {
            // Check if user is banned.
            $q = 'SELECT status FROM users WHERE email LIKE "' . $_POST['email'] . '"';
            $r = mysqli_query($link, $q);
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

            if ($row['status'] == 'Banned') {
                echo '<p id="err_msg">You are banned. Please contact the administrator.</p>';
            } else {
                session_start();
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                load('home.php');
            }
        } else {
            echo "Invalid credentials.";
            echo '<br>Please <a href="./login.php">try again</a> or <a href="register.php">Register</a></p>';
        }
        mysqli_close($link);
    }
