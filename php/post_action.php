<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");
    require(dirname(__FILE__) . "/common/connect_db.php");

    $page_title = 'Post Review';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Check form submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $q = "INSERT INTO mov_rev(id, first_name, last_name, movie_title, rate, message, post_date)
                VALUES('{$_SESSION["user_id"]}',
                    '{$_SESSION["first_name"]}',
                    '{$_SESSION["last_name"]}',
                    '{$_POST["movie_title"]}',
                    '{$_POST["rate"]}',
                    '{$_POST["message"]}',
                    NOW())
        ";

        $r = mysqli_query ( $link, $q );
        if (mysqli_affected_rows($link) != 1) { 
            echo '<p>Error</p>'.mysqli_error($link);
        }
        // Redirect back to review page.
        header("Location: review.php");
    }
?>
