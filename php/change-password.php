<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");

    $page_title = 'Change Password';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // Check form submitted.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require(dirname(__FILE__) . "/common/connect_db.php");
        
        $errors = array();
        
        if (empty($_POST["email"])) {
            $errors[] = "Enter your email address.";
        } else {
            $e = mysqli_real_escape_string($link, trim($_POST["email"]));
        }
        
        if (!empty($_POST["pass1"])) {
            if ($_POST["pass1"] != $_POST["pass2"]) {
                $errors[] = "Passwords do not match.";
            } else {
                $p = mysqli_real_escape_string($link, trim($_POST["pass1"]));
            }
        } else {
            $errors[] = "Enter your password.";
        }
        
        // Check if email address already registered.
        if (empty($errors)) {
            $q = 'SELECT * FROM users WHERE email="$e"';
            $r = @mysqli_query($link, $q);
        }
        
        // On success new password into 'users' database table.
        if (empty($errors)) {
            $q = 'UPDATE users SET pass= SHA2("$p",256) WHERE email="$e"';
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
