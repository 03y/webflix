<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Add Movie';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // Get data from form submission.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require(dirname(__FILE__) . "/common/connect_db.php");
        $errors = array();

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
            // Insert into database.
            $q = "INSERT INTO movie (movie_title, further_info, img, preview) VALUES ('$title', '$info', '$img', '$preview')";
            $r = mysqli_query($link, $q);
            if (!$r) {
                die("Database query failed.");
            } else {
                echo "Added movie";
                
                // Render into a nice HTML table.
                echo '<style>
                table,
                th,
                td {
                    border: 1px solid grey;
                    padding: 25px;
                    margin-left: auto;
                    margin-right: auto;
                }
                </style>';
                
                // Table with movie data.
                echo '<table>';
                echo '<tr>';
                echo '<th>Movie Title</th>';
                echo '<th>Further Info</th>';
                echo '<th>Image</th>';
                echo '<th>Preview</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>' . $title . '</td>';
                echo '<td>' . $info . '</td>';
                echo '<td>' . $img . '</td>';
                echo '<td>' . $preview . '</td>';
                echo '</tr>';  
                echo '</table>';

                // Link back to admin page.
                echo '<br><a href="admin.php">Back to admin page</a>';
            }
        } else {
            // Errors if something went wrong.
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
