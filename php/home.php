<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Home';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    $q = "SELECT * FROM movie";
    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                <a href="./movie.php?id=' . $row['id'] . '">
                <img border="0" alt="' . $row['movie_title'] . '" src=\'/../assets/' . $row['img'] . '\'">
                </a>
                <h2>' . $row['movie_title'] . '</h2>
                <a href="./movie.php?id=' . $row['id'] . '">' . (isset($_SESSION['user_id']) ? 'Stream Now' : 'Login to Stream') . '</a>
                <br><br><br>
            ';
        }
        mysqli_close($link);
    } else {
        echo '<p>No content available to stream (database likely down).</p>';
    }

    include(dirname(__FILE__) . "/../includes/footer.html");
