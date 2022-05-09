<?php
    session_start();
    require(dirname(__FILE__) . "/common/head.php");
    require(dirname(__FILE__) . "/common/redirect.php");
    require(dirname(__FILE__) . "/common/connect_db.php");

    $page_title = 'Review';
    echo '<title> Webflix ∙ ' . $page_title . '</title>';

    // Query database for reviews.
    $q = "SELECT * FROM mov_rev ORDER BY post_date DESC";
    $r = mysqli_query($link, $q);

    // Query output.
    if (mysqli_num_rows($r) > 0) {
        echo '<div class="container">';
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                <div class="alert alert-dark" role="alert">
                    <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
                    <p>Rating:  ' . $row['rate'] . ' &#9734</p>
                    <p>' . $row['message'] . '</p>
                    <hr>
                    <footer class="blockquote-footer">
                        <span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
                        <cite title="Source Title"> '. $row['post_date'].'</cite>
                    </footer>
                </div>
            ';
        }
        echo '
            <a href="post.php><button type="button" id="btn-add-review" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></a>
        ';
    }
    else {
        echo '
            <div class="container">
                <div class="alert alert-secondary" role="alert">
                    <p>There are currently no movie reviews.</p>
                    <a href="post.php><button type="button" id="btn-add-review" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></a>
                </div>
            <div>
        ';
    }
?>

<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rev">Movie Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">

<?php
    echo '
            <form action="post_action.php" method="post" accept-charset="utf-8">
                <div class="form-check">
                    <label for="movie_title">Movie Title: </label>
                    <input type="text" class="form-control" name="movie_title" id="movie_title" required>
                    <label for="rate">Rate Movie: </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="rate" id="rate-5" value="5">&#9734; &#9734; &#9734; &#9734; &#9734;
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="rate" id="rate-4" value="4">&#9734; &#9734; &#9734; &#9734;
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="rate" id="rate-3" value="3">&#9734; &#9734; &#9734;
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="rate" id="rate-2" value="2">&#9734; &#9734;
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="rate" id="rate-1" value="1">&#9734;
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input class="btn btn-dark" type="submit" id="btn-post-review" value="Post Review">
                        </div>
                </div>
            </form>
        </div>
    ';
    mysqli_close($link);
    include(dirname(__FILE__) . "/../includes/footer.html");
