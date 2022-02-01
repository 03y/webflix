<?php
    # Access session.
    if (session_id() == '') {
        session_start();
    }
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
            ';

    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';

    $page_title = "User Area ";
    include(dirname(__FILE__) . "/../includes/logout.html");

    # Redirect if not logged in.
    if (!isset($_SESSION["user_id"])) {
        require("login_tools.php");
        load();
    }

    # Open database connection.
    require("connect_db.php");

    $q = "SELECT * FROM users WHERE user_id={$_SESSION["user_id"]}";
    $r = mysqli_query($link, $q);

    if (mysqli_num_rows($r) > 0) {
        echo '
                    <div class="container">
                    <div class="row">
                ';

        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                        <div class="col-sm">
                            <div class="alert alert-dark" alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                    
                                <h1>'  . $row['first_name'] . ' '  . $row['last_name'] . '<strong>  </h1> 
                            
                                <p><strong> User ID: EC2021 '  . $row['user_id'] . ' </strong></p>
                                <p><strong> Email: </strong> '  . $row['email'] . ' </p>
                                <p><strong> Registration Date: </strong> '  . $row['reg_date'] . ' </p>
                            
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#password">
                                    <i class="fa fa-edit"></i>  Change Password
                                </button>
                            </div>
                        </div>
                    ';
        }
    } else {
        echo "<h3>No user details.</h3>";
    }

    # Retrieve items from 'users' database table.
    $q = "SELECT * FROM users WHERE user_id={$_SESSION["user_id"]}";
    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        echo '<div class="col-sm">';
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                        <div class="alert alert-secondary" alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h1>Card Stored</h1>
                            
                            <p><strong> Card Holder: </strong> '  . $row['first_name'] . '  '  . $row['last_name'] . ' </p>
                            <p><strong> Card Number: </strong> '  . $row['card_number'] . ' </p>
                            <p><strong> Expire Date: </strong> '  . $row['exp_month'] . '   '  . $row['exp_year'] . '</p>
                            
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#card">
                                <i class="fa fa-credit-card"></i>  Update Card 
                            </button>
                        </div>
                    </div>
                    ';
        }

        # Close database connection.
        mysqli_close($link);
    } else {
        echo '
                    <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                        <h1>Card Stored</h1>
                        <h3>No card stored.</h3>
                    </div>
                ';
    }

    # Display footer section.
    include(dirname(__FILE__) . "/../includes/footer.html");
?>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="change-password.php" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Confirm Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass1" class="form-control" placeholder="New Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <input type="submit" name="btnChangePassword" class="btn btn-dark btn-lg btn-block" value="Save Changes" />
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="card" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update-card.php" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Confirm Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="card_no" name="card_no" class="form-control" placeholder="Card Number" value="<?php if (isset($_POST['card_no'])) echo $_POST['card_no']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="exp_m" name="exp_m" class="form-control" placeholder="MM" value="<?php if (isset($_POST['exp_m'])) echo $_POST['exp_m']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="exp_y" name="exp_y" class="form-control" placeholder="YY" value="<?php if (isset($_POST['exp_y'])) echo $_POST['exp_y']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="cvv" name="cvv" class="form-control" placeholder="CVV (the 3 digits on the back of your card)" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>" required>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" name="btnUpdateCard" class="btn btn-dark btn-lg btn-block" value="Save Changes" />
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>