<?php
    require(dirname(__FILE__) . "/common/head.php");

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

    <p>Don't have an account? <a href="./index.php">Register</a></p>
    <p><input type="submit" value="Login" ></p>
</form>
