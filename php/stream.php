<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");
    require(dirname(__FILE__) . "/common/connect_db.php");

    $page_title = 'Stream';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    if (isset($_GET['id'])) $id = $_GET['id'];

    echo '<p>This is a placeholder for what WOULD be the full content, however that is outside of the scope of this project.</p>';
    echo '<input type="button" value="Back" onclick="window.history.back()" />';

    // $q = "SELECT preview FROM movie WHERE id = $id";
    // $r = mysqli_query($link, $q);
    // if (mysqli_num_rows($r) > 0) {
    //     foreach (mysqli_fetch_array($r, MYSQLI_ASSOC) as $row) {
    //         header('Location: '. $row);
    //         load();
    //     }
    // } else {
    //     header('Location: '. $row);
    //     load();
    // }
    // mysqli_close($link);

    include(dirname(__FILE__) . "/../includes/footer.html");
