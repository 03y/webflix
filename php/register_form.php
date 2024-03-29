<!doctype html>
<html lang="en">
    <head>
        <?php
            require(dirname(__FILE__) . "/common/head.php");

            $page_title='Register';
            echo '<title> Webflix ∙ ' . $page_title . '</title>';
        ?>
    </head>

    <body>
        <h1>Register</h1>
        <form action="register.php" method="post">
            <p>
                First Name: <input type="text" name="first_name" size="20" id="first_name" 
                value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
                
                <br>Last Name: <input type="text" name="last_name" size="20" id="last_name" 
                    value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                
                <br>Email: <input type="text" name="email" size="20" id="email" 
                    value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                
                <br>Contact Number: <input type="text" name="contact_no" size="20" id="contact_no" 
                    value="<?php if (isset($_POST['contact_no'])) echo $_POST['contact_no']; ?>">
                
                <br>Country: <input type="text" name="country" size="20" id="country" 
                    value="<?php if (isset($_POST['country'])) echo $_POST['country']; ?>">
                
                <br>Password: <input type="password" name="pass1" size="20" id="pass1" 
                    value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
                
                <br>Confirm Pasword: <input type="password" name="pass2" size="20" id="pass2" 
                    value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
                
                <br>Card Number: <input type="text" name="card_no" size="20" id="card_no" 
                    value="<?php if (isset($_POST['card_no'])) echo $_POST['card_no']; ?>">
                
                <br>Expiry Month: <input type="text" name="exp_m" size="20" id="exp_m" 
                    value="<?php if (isset($_POST['exp_m'])) echo $_POST['exp_m']; ?>">
                
                <br>Expiry Year: <input type="text" name="exp_y" size="20" id="exp_y" 
                    value="<?php if (isset($_POST['exp_y'])) echo $_POST['exp_y']; ?>">
                
                <br>Security: <input type="text" name="cvv" size="20" id="cvv" 
                    value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>">
                
                <br><br>Premium Subscription (£99.99 pa): <input type="checkbox" name="premium" size="20" id="premium" 
                    value="<?php if (isset($_POST['premium'])) echo $_POST['premium']; ?>">
                
                <br>
                <br>
                <input type="submit" value="Register" id="register_submit">
            </p>
    </body>
</html>
