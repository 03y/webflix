<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Admin';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // echo all the movies in a table
    // columns are id, movie_title, further_info, img, preview
    $query = "SELECT * FROM movie";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Database query failed.");
    }

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
    echo '<th>ID</th>';
    echo '<th>Movie Title</th>';
    echo '<th>Further Info</th>';
    echo '<th>Image</th>';
    echo '<th>Preview</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td><a href="./movie.php?id=' . $row['id'] . '">' . $row['movie_title'] . '</a></td>';
        echo '<td>' . $row['further_info'] . '</td>';
        echo '<td><a href="../assets/' . $row['img'] . '.jpg' . '">' . $row['img'] . '.jpg</a></td>';
        echo '<td><a href="' . $row['preview'] . '">' . $row['preview'] . '</a></td>';
        echo '<td><a href="edit_movie_form.php?id=' . $row['id'] . '">Edit</a></td>';
        echo '<td><a href="delete_movie.php?id=' . $row['id'] . '">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';

    // link to add movie form
    echo '<br><a href="add_movie_form.php">Add Movie</a>';
    
    include(dirname(__FILE__) . "/../includes/footer.html");
