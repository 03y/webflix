<?php
    # Access session.
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include(dirname(__FILE__) . "/../includes/logout.html");
    echo '<link rel="stylesheet" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/css/style.css">';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">';

    # Redirect if not logged in.
    if (!isset($_SESSION['user_id'])) {
        require('login_tools.php');
        load();
    }

    require('connect_db.php');

    # Retrieve items from 'bookings' database table.
    $q = "SELECT * FROM booking WHERE user_id={$_SESSION["user_id"]}
            ORDER BY booking_id DESC";

    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        echo '<div class="container">';
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="alert alert-dark" role="alert">
                    <h4 class="alert-heading">Booking: EC2021' . $row['booking_id'] . '  </h4>
                    <div class="alert alert-secondary" role="alert">
                    <p>Booked on:  ' . $row['booking_date'] . '</p>
                    <p>Total:  £' . $row['total'] . '</p>
                    <p>QR Code:</p>
                    <img width="256" class="img-fluid" alt="QR Code " src="http://webdev.edinburghcollege.ac.uk/~HNDSOFTSA22/php5/img/qrcode.png">
                    </footer>
                </div>
            ';  
        }
    } else {
        echo '
            <div class="container">
                <br>
                <div class="alert alert-secondary" role="alert">
                    <p>You have no bookings</p>
                </div>
            </div>
        ';
    }
    
    include(dirname(__FILE__) . "/../includes/footer.html");
?>
