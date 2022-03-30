<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Home';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // inline css..
    echo '
    <style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        padding: 10px;
    }
    .grid-item {
        padding: 20px;
        font-size: 30px;
        text-align: center;
    }

    .zoom {
        padding: 50px;
        transition: transform .2s; /* Animation */
        margin: 0 auto;
    }
    
    .zoom:hover {
        transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
    </style>
    ';

    echo '<div class="grid-container">';
    $q = "SELECT * FROM movie";
    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="grid-item">';
            echo '<div class="zoom">';
            echo '
            <a href="./movie.php?id=' . $row['id'] . '">
                <img width="256" height="400" border="0" alt="' . $row['movie_title'] . '" src=\'/../assets/' . $row['img'] . '\'">
            </a>
                <h2>' . $row['movie_title'] . '</h2>
                <a href="./movie.php?id=' . $row['id'] . '">' . (isset($_SESSION['user_id']) ? 'Stream Now' : 'Login to Stream') . '</a>
                <br><br><br>
            ';
            echo '</div>';
            echo '</div>';
        }
        mysqli_close($link);
    } else {
        echo '<p>No content available to stream (database likely down).</p>';
    }
    echo '</div>';
    
    include(dirname(__FILE__) . "/../includes/footer.html");
