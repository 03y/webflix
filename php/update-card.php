<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");
    require(dirname(__FILE__) . "/common/connect_db.php");

    // Check form submitted.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = array();
        
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
        
        // Check if card is already registered.
        if (empty($errors)) {
            $q = 'SELECT * FROM users WHERE card_no="$card_no"';
            $r = @mysqli_query($link, $q);
        }
        
        if (empty($errors)) {
            $q = 'UPDATE users SET card_number="$card_no", exp_month="$exp_m", exp_year="$exp_y", cvv="$cvv" WHERE email="$e"';
            $r = @mysqli_query($link, $q);
            
            if ($r) {
                header("Location: user.php");
            } else {
                echo "Error updating record: " . $link->error;
            }
            
            mysqli_close($link);
            exit();
        } else {
            echo '
                <div class="container"><div class="alert alert-dark alert-dismissible fade show">
                    <h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>
            ';

            foreach ($errors as $msg) {
                echo " - $msg<br>";
            }
            echo "Please try again.</div></div>";

            mysqli_close($link);
        }
    }
