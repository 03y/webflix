<?php
    session_start();
    
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");

    $_SESSION = array();
    session_destroy();

    echo '<h1>Goodbye!</h1><p>You are now logged out.</p><p><a href="login.php">Login</a></p>';

    include(dirname(__FILE__) . "/../includes/footer.html");
?>
