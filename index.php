<!doctype html>
<html lang="en">
    <head>
        <!-- random boostrap stuff i probably dont need -->
        <!-- Required meta tags -->
        <!-- <meta charset="utf-8"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
        
        <link rel="stylesheet" href="css/style.css">
    </head>

    <?php
        include(dirname(__FILE__) . "/includes/login.html");
    ?>

    <body>
        <h1>Register</h1>
        <form action = "php/register.php" method = "post">
            <p>
                First Name: <input type = "text" name = "first_name" size = "20" 
                value = "<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
                
                <br>Last Name: <input type = "text" name = "last_name" size = "20" 
                    value = "<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                
                <br>Email: <input type = "text" name = "email" size = "20" 
                    value = "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                
                <br>Password: <input type = "password" name = "pass1" size = "20" 
                    value = "<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
                
                <br>Confirm Pasword: <input type = "password" name = "pass2" size = "20" 
                    value = "<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
                
                <br>Card Number: <input type = "text" name = "card_no" size = "20" 
                    value = "<?php if (isset($_POST['card_no'])) echo $_POST['card_no']; ?>">
                
                <br>Expiry Month: <input type = "text" name = "exp_m" size = "20" 
                    value = "<?php if (isset($_POST['exp_m'])) echo $_POST['exp_m']; ?>">
                
                <br>Expiry Year: <input type = "text" name = "exp_y" size = "20" 
                    value = "<?php if (isset($_POST['exp_y'])) echo $_POST['exp_y']; ?>">
                
                <br>Security: <input type = "text" name = "cvv" size = "20" 
                    value = "<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>">
                
                <br>
                <br>
                <input type = "submit" value = "Register">
            </p>
    </body>
</html>
