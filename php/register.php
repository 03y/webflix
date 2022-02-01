<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include(dirname(__FILE__) . "/../includes/login.html");
    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require("connect_db.php");
        $errors = array();

        if (empty($_POST["first_name"])) {
            $errors[] = "Enter your first name.";
        } else {
            $fn = mysqli_real_escape_string($link, trim($_POST["first_name"]));
        }

        if (empty($_POST["last_name"])) {
            $errors[] = "Enter your last name.";
        } else {
            $ln = mysqli_real_escape_string($link, trim($_POST["last_name"]));
        }

        if (empty($_POST["email"])) {
            $errors[] = "Enter your email.";
        } else {
            $e = mysqli_real_escape_string($link, trim($_POST["email"]));
        }

        if (!empty($_POST["pass1"])) {
            if ($_POST["pass1"] != $_POST["pass2"]) {
                $errors[] = "Passwords do not match";
            } else {
                $p = mysqli_real_escape_string($link, trim($_POST["pass1"]));
            }
        } else {
            $errors[] = "Enter your password.";
        }

        if (empty($_POST["card_no"])) {
            $errors[] = "Enter your card_number.";
        } else {
            $card_no = mysqli_real_escape_string($link, trim($_POST["card_no"]));
        }

        if (empty($_POST["exp_m"])) {
            $errors[] = "Enter your exp_month.";
        } else {
            $exp_m = mysqli_real_escape_string($link, trim($_POST["exp_m"]));
        }

        if (empty($_POST["exp_y"])) {
            $errors[] = "Enter your exp_year.";
        } else {
            $exp_y = mysqli_real_escape_string($link, trim($_POST["exp_y"]));
        }

        if (empty($_POST["cvv"])) {
            $errors[] = "Enter your cvv.";
        } else {
            $cvv = mysqli_real_escape_string($link, trim($_POST["cvv"]));
        }

        if (empty($errors)) {
            
            $q = "SELECT user_id FROM users WHERE email = 'e'";
            $r = @mysqli_query($link, $q);
            
            if (mysqli_num_rows($r) != 0) {
                $errors[] = "Email address already registered.";
                echo "<a href='login.php'>Login</a>";
            }
        }
        
        if (empty($errors)) {
            $q = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date)
                VALUES ('$fn', '$ln', '$e', SHA2('$p', 256), $card_no, $exp_m, $exp_y, $cvv, NOW())";
            $r = @mysqli_query($link, $q);

            if ($r) {
                echo "<h1>Registered!</h1><p>You are now registered.</p>";
                echo '<a href="login.php">Login</a>';
            }
            
            mysqli_close($link);
        } else {
            echo "<h1>Error!</h1><p id='err_msg'>The following error(s) occurred:<br>";

            foreach ($errors as $msg) {
                echo " - $msg<br>";
            }
            echo "Please try again.</p>";
            
            mysqli_close($link);
        }
    }
?>

<?php
    include(dirname(__FILE__) . "/../includes/footer.html");
?>
