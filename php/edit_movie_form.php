<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Edit Movie';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if (isset($errors) && !empty($errors)) {
        echo '<p id="err_msg">Oops! There was a problem:<br>';
        
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        
        echo 'brokey</p>';
    }

    // get id from URL
    if (isset($_GET['id'])) $id = $_GET['id'];

    // require database connection
    require(dirname(__FILE__) . "/common/connect_db.php");

    // SQL get movie data
    $q = "SELECT * FROM movie WHERE id = $id";
    $r = mysqli_query($link, $q);
    if (!$r) {
        die("Database query failed.");
    } else {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $id = $row['id'];
        $movie_title = $row['movie_title'];
        $further_info = $row['further_info'];
        $img = $row['img'];
        $preview = $row['preview'];
    }
?>

<!-- Edit movie form -->
<h1>Add Movie</h1>
<form action="edit_movie.php" method="post">
    <p>
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    </p>
    <p>
        <label for="movie_title">Movie Title</label>
        <input type="text" name="movie_title" id="movie_title" value="<?php echo $movie_title; ?>">
    </p>
    <p>
        <label for="further_info">Further Info</label>
        <input type="text" name="further_info" id="further_info" value="<?php echo $further_info; ?>">
    </p>
    <p>
        <label for="img">Image</label>
        <input type="text" name="img" id="img" value="<?php echo $img; ?>">
    </p>
    <p>
        <label for="preview">Preview</label>
        <input type="text" name="preview" id="preview" value="<?php echo $preview; ?>">
    </p>

        <input type="submit" name="submit" value="Edit Movie">
</form>
