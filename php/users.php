<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Users';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // Echo all the users in a table.
    // Columns are user_id, first_name, last_name, email, card_number, exp_month, exp_year, cvv, reg_date, premium.
    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Database query failed.");
    } else {
        // Render in a nice HTML table.
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
        echo '<th>Phone</th>';
        echo '<th>Country</th>';
        echo '<th>Registration Date</th>';
        echo '<th>Status</th>';
        echo '<th>Premium</th>';
        echo '<th>Edit</th>';
        echo '<th>Delete</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['user_id'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['contact_no'] . '</td>';
            echo '<td>' . $row['country'] . '</td>';
            echo '<td>' . $row['reg_date'] . '</td>';
            echo $row['status'] == 'Active' ? '<td style="color: green !important;">Active</td>' : '<td style="color: red !important;">Banned</td>';
            echo $row['premium'] == 1 ? '<td style="color: green !important;">Yes</td>' : '<td style="color: red !important;">No</td>';
            echo '<td><a href="edit_user_form.php?user_id=' . $row['user_id'] . '">Edit</a></td>';
            echo '<td><a href="delete_user.php?user_id=' . $row['user_id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    include(dirname(__FILE__) . "/../includes/footer.html");
