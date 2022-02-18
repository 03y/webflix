<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");

    $page_title = 'Change Subscription';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require(dirname(__FILE__) . "/common/connect_db.php");
        
        $errors = array();
        if (empty($errors)) {
            echo '<h1>' . $_POST["premium"] . '</h1>';
            
            // $q = 'UPDATE users SET premium=$_POST["premium"] WHERE id=$_POST["id"]';
            // $r = @mysqli_query($link, $q);
            
            // if ($r) {
            //     header("Location: user.php");
            // } else {
            //     echo "Error updating record: " . $link->error;
            // }
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
