<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    if (isset($_GET['id'])) $id = $_GET['id'];
    
    if (!isset($_SESSION['user_id'])) {
        $q = "SELECT * FROM movie WHERE id = $id";
        $r = mysqli_query($link, $q);
        if (mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            echo '
                <div class="container">
                    <h1 class="display-4">' . $row['movie_title'] . '</h1>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <p>' . $row['further_info'] . '</p>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h4>Stream</h4>
                            <hr>
                            <h2> 
                                <a href="./login.php"> <button type="button" class="btn btn-secondary" role="button"> Login to stream </button></a>
                                <h4>Movie Reviews</h4>
                                <hr>
                            </h2> 
                            <a href="mov-rev.php?movie_title=' . $row['movie_title'] . '"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['movie_title'] . ' </button></a>
                            <a href="review.php?id=' . $row['id'] . '"> <button type="button" class="btn btn-secondary" role="button">All Movies</button></a>
                        </div>
            ';
        }
    } else {
        $q = "SELECT * FROM movie WHERE id = $id";
        $r = mysqli_query($link, $q);
        if (mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            echo '
                <div class="container">
                    <h1 class="display-4">' . $row['movie_title'] . '</h1>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src='. $row['preview'].'   
                                    frameborder="0" allow="accelerometer; 
                                    autoplay; 
                                    encrypted-media; 
                                    gyroscope; 
                                    picture-in-picture"   allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <p>' . $row['further_info'] . '</p>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h4>Stream</h4>
                            <h2> 
                            <a href="' . $row['preview'] . '"> <button type="button" class="btn btn-secondary" role="button"> Stream Now </button></a>
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
