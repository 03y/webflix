<?php
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Login';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

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
    <p>Email Address: <input type="text" name="email" id="email"> </p>
    <p>Password: <input type="password" name="pass" id="pass"></p>

    <p>Don't have an account? <a href="./register_form.php">Register</a></p>
    <p><input type="submit" value="Login" id="login_submit"></p>
</form>
