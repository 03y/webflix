<?php
    // check if admin
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Add Movie';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if (isset($errors) && !empty($errors)) {
        echo '<p id="err_msg">Oops! There was a problem:<br>';
        
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        
        echo 'brokey</p>';
    }
?>

<h1>Add Movie</h1>
<form action="add_movie.php" method="post">
    <p>
        <label for="movie_title">Movie Title</label>
        <input type="text" name="movie_title" id="movie_title" value="">
    </p>
    <p>
        <label for="further_info">Further Info</label>
        <input type="text" name="further_info" id="further_info" value="">
    </p>
    <p>
        <label for="img">Image</label>
        <input type="text" name="img" id="img" value="">
    </p>
    <p>
        <label for="preview">Preview</label>
        <input type="text" name="preview" id="preview" value="">
    </p>
    <p>
        <input type="submit" name="submit" value="Add Movie">
    </p>
</form>
