<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Add Movie';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require(dirname(__FILE__) . "/common/connect_db.php");
        $errors = array();

        if (empty($_POST["id"])) {
            $errors[] = "something broke (id not set)";
        } else {
            $id = mysqli_real_escape_string($link, trim($_POST["id"]));
        }

        if (empty($_POST["movie_title"])) {
            $errors[] = "Enter movie title.";
        } else {
            $title = mysqli_real_escape_string($link, trim($_POST["movie_title"]));
        }

        if (empty($_POST["further_info"])) {
            $errors[] = "Enter further info.";
        } else {
            $info = mysqli_real_escape_string($link, trim($_POST["further_info"]));
        }

        if (empty($_POST["img"])) {
            $errors[] = "Enter image.";
        } else {
            $img = mysqli_real_escape_string($link, trim($_POST["img"]));
        }

        if (empty($_POST["preview"])) {
            $errors[] = "Enter preview.";
        } else {
            $preview = mysqli_real_escape_string($link, trim($_POST["preview"]));
        }

        if (empty($errors)) {
            $q = "UPDATE movie SET movie_title = '$title', further_info = '$info', img = '$img', preview = '$preview' WHERE id = '$id'";
            $r = mysqli_query($link, $q);

            if (!$r) {
                die("Database query failed.");
            } else {
                echo "Updated movie";

                // link back to admin page
                echo '<br><a href="admin.php">Back to admin page</a>';
            }

        } else {
            echo "There were " . count($errors) . " errors in the form.";
            echo "<br>";
            echo "<br>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }
    }
    include(dirname(__FILE__) . "/../includes/footer.html");
?>
