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
//check to see if username and passowrd match
function user_check($username, $pass, $dbFile)
{
    $db = connectToDatabase($dbFile);
    $stmt = $db->prepare("SELECT * FROM userlogin WHERE username = ? and pass = ?");
    $params = [$username, $pass];
    $stmt->execute($params);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($res) {
        return true;
    } else {
        return false;
    }
}
/*-----------------------------------------------*/
//if not logged in, redirect to login
function login_check()
{
    if (!isset($_SESSION["username"])) {
        $loginPage = "?page=login";
        // Redirect to success
        return header("Location: $loginPage");
    } else {
        return null;
    }
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
function mainType($nav)
{
    if ($nav == "under") {
        return ' class="main_undernav"';
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
function connectToDatabase($filename)
{
    $dsn = "sqlite:$filename";
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to DSN:<br>$dsn<br>";
        throw $e;
    }
    return $db;
}
/*-----------------------------------------------*/
function searchMovieDB($find, $dbFile, $exact = null)
{
    if ($find == null) {
        return null;
    } else {
        $db = connectToDatabase($dbFile);
        $stmt = $db->prepare("SELECT * FROM movies WHERE Title LIKE ? OR Year LIKE ? ORDER BY Position");
        $params = ($exact ? [$find, $find] : ['%'. $find.'%', '%'.$find.'%']);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
/*-----------------------------------------------*/
function searchJettyDB($find, $dbFile)
{
    if ($find == null) {
        return null;
    } else {
        $db = connectToDatabase($dbFile);
        $stmt = $db->prepare("SELECT * FROM jetty WHERE boatType LIKE ? OR boatEngine LIKE ?");
        $params = [$find.'%', $find.'%'];
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
/*-----------------------------------------------*/
function makeMovieTable($res)
{
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $rows .= "<tr>";
            $rows .= "<td>{$row['Position']}</td>";
            $rows .= "<td class='title'>{$row['Title']}</td>";
            $rows .= "<td>{$row['Year']}</td>";
            $rows .= "<td>{$row['Oscars']}</td>";
            $rows .= "<td>{$row['Rating']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>Position</th>
            <th>Title</th>
            <th>Year</th>
            <th>Oscars</th>
            <th>Rating</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Empty Database!</p>';
    }
}
/*-----------------------------------------------*/
function makeJettyTable($res)
{
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $rows .= "<tr>";
            $rows .= "<td>{$row['position']}</td>";
            $rows .= "<td>{$row['boatType']}</td>";
            $rows .= "<td>{$row['boatEngine']}</td>";
            $rows .= "<td>{$row['boatLength']}</td>";
            $rows .= "<td>{$row['boatWidth']}</td>";
            $rows .= "<td>{$row['ownerName']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>Pos</th>
            <th>Type</th>
            <th>Engine</th>
            <th>Length</th>
            <th>Width</th>
            <th>Owner</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Sorry, nothing found!</p>';
    }
}
/*-----------------------------------------------*/
function makeUpdateTable($res, $page, $delete = null)
{
    $icon = ($delete ? "&#10060;" : "&#9998;");
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $position = htmlentities($row['Position']);
            $rows .= "<tr>";
            $rows .= "<td><a href='$page&Position=$position'>$position $icon</a></td>";
            $rows .= "<td class='title'>{$row['Title']}</td>";
            $rows .= "<td>{$row['Year']}</td>";
            $rows .= "<td>{$row['Oscars']}</td>";
            $rows .= "<td>{$row['Rating']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>Position</th>
            <th>Title</th>
            <th>Year</th>
            <th>Oscars</th>
            <th>Rating</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Empty Database!</p>';
    }
}
/*-----------------------------------------------*/
