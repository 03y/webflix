<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Home';

    $q = "SELECT * FROM movie";
    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                <a href="./movie.php?id=' . $row['id'] . '">
                <img border="0" alt="Book Now" src=\'/../assets/' . $row['img'] . '\'">
                </a>
                <h2>' . $row['movie_title'] . '</h2>
                <a href="./movie.php?id=' . $row['id'] . '">Stream Now</a>
                <br><br><br>
            ';
        }
        mysqli_close($link);
    } else {
        echo '<p>There are currently no movies showing.</p>';
    }

    include(dirname(__FILE__) . "/../includes/footer.html");
