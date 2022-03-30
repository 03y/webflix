<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    // require(dirname(__FILE__) . "/common/redirect.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    if (isset($_GET['id'])) $id = $_GET['id'];
    $q = "SELECT * FROM movie WHERE id = $id";
    $r = mysqli_query($link, $q);
    
    // idk what premium subscription does.
    // so um yeah it doesnt do anything rn.

    if (mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $page_title = $row['movie_title'];
        echo '<title> Webflix ∙ ' . $page_title . '</title>';
        echo '
            <div class="container">
                <h1 class="display-4">' . $row['movie_title'] . '</h1>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img width="256" height="400" border="0" alt="' . $row['movie_title'] . '" src=\'/../assets/' . $row['img'] . '\'">
                        <br>
                        <br>
                        <p>' . $row['further_info'] . '</p>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <h4>Stream</h4>
                        <h2> 
                        <a href="' . $row['preview'] . '"> <button type="button" class="btn btn-secondary" role="button"> Watch trailer </button></a>
                        <hr>
                        <h4>Movie Reviews</h4>
                        <hr>
                        </h2> 
                        <a href="mov-rev.php?movie_title=' . $row['movie_title'] . '"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['movie_title'] . ' </button></a>
                        <a href="review.php?id=' . $row['id'] . '"> <button type="button" class="btn btn-secondary" role="button">All Movies</button></a>
                    </div>
        ';

        // if logged in
        if (isset($row['id'])) {
            echo '
                <div class="col-sm-12 col-md-4">
                    <h4>Stream</h4>
                    <h2> 
                    <a href="stream.php?id=' . $row['id'] . '"> <button type="button" class="btn btn-secondary" role="button"> Stream Now </button></a>
                    <hr>
                    <h4>Movie Reviews</h4>
                    <hr>
                    </h2> 
                    <a href="mov-rev.php?movie_title=' . $row['movie_title'].'"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['movie_title'] . ' </button></a>
                    <a href="review.php?id=' . $row['id'] . '"> <button type="button" class="btn btn-secondary" role="button">All Movies</button></a>
                </div>
            ';
        }
    }

    $page_title = 'Show';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

