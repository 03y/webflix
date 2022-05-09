<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Edit User';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // Get data from form submission.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require(dirname(__FILE__) . "/common/connect_db.php");
        $errors = array();

        if (empty($_POST["user_id"])) {
            $errors[] = "something broke (user_id not set)";
        } else {
            $user_id = mysqli_real_escape_string($link, trim($_POST["user_id"]));
        }

        if (empty($_POST["first_name"])) {
            $errors[] = "something broke (first_name not set)";
        } else {
            $first_name = mysqli_real_escape_string($link, trim($_POST["first_name"]));
        }

        if (empty($_POST["last_name"])) {
            $errors[] = "something broke (last_name not set)";
        } else {
            $last_name = mysqli_real_escape_string($link, trim($_POST["last_name"]));
        }

        if (empty($_POST["email"])) {
            $errors[] = "something broke (email not set)";
        } else {
            $email = mysqli_real_escape_string($link, trim($_POST["email"]));
        }
        
        if (empty($_POST["contact_no"])) {
            $errors[] = "something broke (contact_no not set)";
        } else {
            $contact_no = mysqli_real_escape_string($link, trim($_POST["contact_no"]));
        }
        
        if (empty($_POST["country"])) {
            $errors[] = "something broke (country not set)";
        } else {
            $country = mysqli_real_escape_string($link, trim($_POST["country"]));
        }
        

        // Parse data for non-text fields.
        $status = isset($_POST['status']) ? "Banned" : "Active";
        $premium = isset($_POST['premium']) ? 1 : 0;

        if (empty($errors)) {
            // Update database.
            $q = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', contact_no = '$contact_no', country = '$country', status = '$status', premium = '$premium' WHERE user_id = '$user_id'";
            $r = mysqli_query($link, $q);

            if (!$r) {
                die("Database query failed.");
            } else {
                echo "Updated user";

                // Link back to admin page.
                echo '<br><a href="users.php">Back to admin page</a>';
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
