<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Users';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // echo all the users in a table
    // columns are user_id, first_name, last_name, email, card_number, exp_month, exp_year, cvv, reg_date, premium
    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Database query failed.");
    } else {
        // table css
        echo '<style>
        table,
        th,
        td {
            border: 1px solid grey;
            padding: 25px;
            margin-left: auto;
            margin-right: auto;
        }
        </style>';

        echo '<table>';
        echo '<tr>';
        echo '<th>User ID</th>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>Email</th>';
        echo '<th>Registration Date</th>';
        echo '<th>Premium</th>';
        echo '<th>Delete</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['user_id'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['reg_date'] . '</td>';
            echo '<td>' . $row['premium'] . '</td>';
            echo '<td><a href="delete_user.php?user_id=' . $row['user_id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    include(dirname(__FILE__) . "/../includes/footer.html");
