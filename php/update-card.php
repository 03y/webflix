<?php
    # Access session.
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';
    include(dirname(__FILE__) . "/../includes/logout.html");

    # Redirect if not logged in.
    if (!isset($_SESSION["user_id"])) {
        require("login_tools.php");
        load();
    }

    # Check form submitted.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # Connect to the database.
        require("connect_db.php");
        
        # Initialize an error array.
        $errors = array();
        
        # Check for an email address:
        if (empty($_POST["email"])) {
            $errors[] = "Enter your email address.";
        } else {
            $e = mysqli_real_escape_string($link, trim($_POST["email"]));
        }
        
        if (!empty($_POST["card_no"])) {
            $card_no = mysqli_real_escape_string($link, trim($_POST["card_no"]));
        } else {
            $errors[] = "Enter your card number.";
        }

        if (!empty($_POST["exp_m"])) {
            $exp_m = mysqli_real_escape_string($link, trim($_POST["exp_m"]));
        } else {
            $errors[] = "Enter your expiry month.";
        }

        if (!empty($_POST["exp_y"])) {
            $exp_y = mysqli_real_escape_string($link, trim($_POST["exp_y"]));
        } else {
            $errors[] = "Enter your expiry year.";
        }

        if (!empty($_POST["cvv"])) {
            $cvv = mysqli_real_escape_string($link, trim($_POST["cvv"]));
        } else {
            $errors[] = "Enter your cvv (the 3 digits on the back of your card).";
        }
        
        # Check if card is already registered.
        if (empty($errors)) {
            $q = 'SELECT * FROM users WHERE card_no="$card_no"';
            $r = @mysqli_query($link, $q);
        }
        
        # On success new password into 'users' database table.
        if (empty($errors)) {
            $q = 'UPDATE users SET card_number="$card_no", exp_month="$exp_m", exp_year="$exp_y", cvv="$cvv" WHERE email="$e"';
            $r = @mysqli_query($link, $q);
            
            if ($r) {
                header("Location: user.php");
            } else {
                echo "Error updating record: " . $link->error;
            }

            # Close database connection.
            mysqli_close($link);
            exit();

        } else {
            # Or report errors.
            echo '
                <div class="container"><div class="alert alert-dark alert-dismissible fade show">
                    <h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>
            ';

            foreach ($errors as $msg) {
                echo " - $msg<br>";
            }
            echo "Please try again.</div></div>";

            # Close database connection.
            mysqli_close($link);
        }
    }
