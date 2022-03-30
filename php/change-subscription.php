<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");

    $page_title = 'Change Subscription';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require(dirname(__FILE__) . "/common/connect_db.php");

        if (empty($_POST["email"])) {
            $errors[] = "Enter your email address.";
        } else {
            $e = mysqli_real_escape_string($link, trim($_POST["email"]));
        }

        $premium_subscription = 1;
        if ($_POST["subscription"] == "free-subscription") {
            $premium_subscription = 0;
        }
        
        $errors = array();
        if (empty($errors)) {
            $q = 'UPDATE users SET premium=' . $premium_subscription . ' WHERE email="' . $e . '"';
            $r = @mysqli_query($link, $q);
            if ($r) {
                echo '<p>Updated subscription status to ' . ($premium_subscription ? "<b>premium</b>" : "<b>free</b>") . '.</p>';
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
