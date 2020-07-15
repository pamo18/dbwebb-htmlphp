<?php
/**
 * A processing page that does a redirect.
 */
if ($_POST["firstName"] ?? false) {
    $_SESSION["firstName"] = $_POST["firstName"];
    (isset($_POST["lastName"]) ? $_SESSION["lastName"] = $_POST["lastName"] : null);
    $url = "?page=success";
    // Redirect to success
    header("Location: $url");
}

if ($_POST["message"] ?? false) {
    $_SESSION["message"] = $_POST["message"];
    $url = "?page=post_text";
    // Redirect to success_text
    header("Location: $url");
}

if ($_POST["theme_choice"] ?? false) {
        $_SESSION["theme"] = $_POST["theme_choice"];
        $url = "?page=me";
        // Redirect to success_text
        header("Location: $url");
}
//Login test
if ($_POST["username"] ?? false) {
    $granted = false;
    switch (true) {
        case ($_POST["username"] = "doe" && $_POST["password"] == "doe"):
            $granted = true;
            break;
        case ($_POST["username"] = "admin" && $_POST["password"] == "admin"):
            $granted = true;
            break;
    }
    if ($granted) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["login_status"] = "granted";
            $url = "?page=me";
            header("Location: $url");

    } else {
        $_SESSION["login_error"] = true;
        $url = "?page=login";
        // Redirect to success_text
        header("Location: $url");
    }
}
