<?php if (!isset($_SESSION["username"])) {
    $login_page = "?page=login";
    // Redirect to success
    header("Location: $login_page");
} else { ?>

            <h1>Session Contents</h1>
            <p>Session name = <?php echo session_name() ?></p>
            <?php foreach ($_SESSION as $key => $value) : ?>
            <p><?php print_r($key . " = " . $value); ?></p>
            <?php endforeach ?>

<?php } ?>
