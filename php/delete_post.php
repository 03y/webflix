<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");
    require(dirname(__FILE__) . "/common/connect_db.php");
    
    $page_title = 'Delete Post';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';
    
    // Get ID from URL.
    if (isset($_GET['post_id'])) $post_id = $_GET['post_id'];
    
    // Delete from database.
    $sql = "DELETE FROM mov_rev WHERE post_id='$post_id'";
    if ($link->query($sql) === TRUE) {
        // Redirect back to review page.
        header("Location: my_reviews.php");
    } else {
        echo "Error deleting record: " . $link -> error;
    }
