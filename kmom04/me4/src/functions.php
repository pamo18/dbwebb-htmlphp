<?php
/**
 * Definitions of commonly used functions.
 */

/*-----------------------------------------------*/
function sessionDestroy()
{
    $_SESSION = [];
    //Delete session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    //Session ends
    session_destroy();
}
/*-----------------------------------------------*/
//Page reload counter
function counter()
{
    $number = $_SESSION["number"] ?? 0;
    $number++;
    $_SESSION["number"] = $number;
}
/*-----------------------------------------------*/
//HTML Main CSS class for sessions menu, shorter min height
function sessionMain($pagetype)
{
    if ($pagetype == "session") {
        return "main_Session";
    } else {
        return null;
    }
}
/*-----------------------------------------------*/
//Checks for message type and changes class if found
function messageCheck($check, $type)
{
    if (isset($_SESSION[$check])) {
        if ($type ==  "error") {
            return "errorMessage";
        } elseif ($type == "success") {
            return "successMessage";
        }
    } else {
        return "off";
    }
}
/*-----------------------------------------------*/
//Text message returned from post>session
function textMessage()
{
    if (isset($_SESSION["message"])) {
        return $_SESSION["message"];
    } else {
        return "error, empty!";
    }
}
/*-----------------------------------------------*/
// css for main/session pages
function sessionType($pageType)
{
    if ($pageType == "session") {
        return ' class="main_Session"';
    } else {
        return null;
    }
}
/*-----------------------------------------------*/
// Checks for active theme or returns deafult css
function themeCheck()
{
    if (isset($_SESSION["theme"])) {
        return $_SESSION["theme"];
    } else {
        return "default";
    }
}
/*-----------------------------------------------*/
function themeDefault()
{
    if (isset($_SESSION["theme"])) {
        if ($_SESSION["theme"] == "default") {
            return " selected";
        } else {
            return null;
        }
    }
}
/*-----------------------------------------------*/
function themeDark()
{
    if (isset($_SESSION["theme"])) {
        if ($_SESSION["theme"] == "dark") {
            return " selected";
        } else {
            return null;
        }
    }
}
/*-----------------------------------------------*/
function themeColour()
{
    if (isset($_SESSION["theme"])) {
        if ($_SESSION["theme"] == "colour") {
            return " selected";
        } else {
            return null;
        }
    }
}
/*-----------------------------------------------*/
