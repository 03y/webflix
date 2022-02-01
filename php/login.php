<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    # DISPLAY COMPLETE LOGIN PAGE.
    # Display any error messages if present.
    include(dirname(__FILE__) . "/../includes/login.html");
    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';

    if (isset($errors) && !empty($errors)) {
        echo '<p id="err_msg">Oops! There was a problem:<br>';
        
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        
        echo 'Please try again or <a href="register.php">Register</a></p>';
    }
?>

<h1>Login</h1>
<form action="login_action.php" method="post">
    <p>Email Address: <input type="text" name="email"> </p>
    <p>Password: <input type="password" name="pass"></p>

    <p>Don't have an account? <a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/index.php">Register</a></p>
    <p><input type="submit" value="Login" ></p>
</form>
