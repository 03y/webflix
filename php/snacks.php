<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <!-- <meta charset="utf-8"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
        
    </head>
    
    <?php
            # Access session.
            session_start();
            
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            // if (!isset($_SESSION['user_id'])) {
            //     include(dirname(__FILE__) . "/../includes/login.html");
            // } else {
            //     include(dirname(__FILE__) . "/../includes/logout.html");
            // }

            include(dirname(__FILE__) . "/../includes/" . (isset($_SESSION['user_id']) ? "logout.html" : "login.html"));
            
            echo "<link rel=\"stylesheet\" href=\"http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css\">";
    ?>

    <body>
        <h1>Snacks</h1>
        <br><br>
        <img src="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/popcorn.png" alt="popcorn" width="100em">
        <br>
        <h3>Popcorn - £2</h3>
        <br><br>

        <img src="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/cola.png" alt="cola" width="100em">
        <br>
        <h3>Fizzy Drinks - £1</h3>
        <br><br>

        <img src="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/cookie.png" alt="cookie" width="100em">
        <br>
        <h3>Cookies - £1</h3>
        <br><br>
    </body>
</html>
