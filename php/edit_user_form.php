<?php
    require(dirname(__FILE__) . "/common/admin_check.php");
    require(dirname(__FILE__) . "/common/head.php");

    $page_title = 'Edit User';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if (isset($errors) && !empty($errors)) {
        echo '<p id="err_msg">Oops! There was a problem:<br>';
        
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        
        echo 'brokey</p>';
    }

    // get user id from URL
    if (isset($_GET['user_id'])) $user_id = $_GET['user_id'];

    // require database connection
    require(dirname(__FILE__) . "/common/connect_db.php");

    // SQL get movie data
    $q = "SELECT * FROM users WHERE user_id = $user_id";
    $r = mysqli_query($link, $q);
    if (!$r) {
        die("Database query failed.");
    } else {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $contact_no = $row['contact_no'];
        $country = $row['country'];
        $status = $row['status'];
        $premium = $row['premium'];
    }
?>

<h1>Edit User</h1>
<form action="edit_user.php" method="post" id="edit_user">
    <p>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
    </p>
    <p>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
    </p>
    <p>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
    </p>
    <p>
        <label for="contact_no">Phone Number</label>
        <input type="text" name="contact_no" id="contact_no" value="<?php echo $contact_no; ?>">
    </p>
    <p>
        <label for="country">Country</label>
        <input type="text" name="country" id="country" value="<?php echo $country; ?>">
    </p>
    <p>
        <label for="status">Banned</label>
        <input type="checkbox" name="status" size="20" id="status" <?php if($status=="Banned") echo "checked=\"checked\""?>>
    </p>
    <p>
        <label for="premium">Premium</label>
        <input type="checkbox" name="premium" size="20" id="premium" <?php if($premium==1) echo "checked=\"checked\""?>>
    </p>

        <input type="submit" name="submit" value="Edit User">
</form>
