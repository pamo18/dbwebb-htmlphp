<?php if (!isset($_SESSION["username"])) {
    $login_page = "?page=login";
    // Redirect to success
    header("Location: $login_page");
} else { ?>

            <h1>Om denna sida</h1>
            <p>Kommer snart</p>

<?php } ?>
