
<?php
//Login test
if ($_POST["username"] ?? false) {
    $granted = false;
    $granted = user_check($_POST["username"], $_POST["password"], $DBuser);
    if ($granted) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["login_status"] = "granted";
            $url = "?page=admin";
            header("Location: $url");
    } else {
        $_SESSION["login_error"] = true;
        $url = "?page=login";
        // Redirect to success_text
        header("Location: $url");
    }
} else {
    header("Location: ?page=login");
}
