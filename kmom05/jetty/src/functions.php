<?php
/**
 * Definitions of commonly used functions.
 */

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

function searchDB($find)
{
    if ($find == null) {
        return null;
    } else {
        $jettdb = __DIR__.'/../db/boatclub.sqlite';
        $db = connectToDatabase($jettdb);
        $stmt = $db->prepare("SELECT * FROM jetty WHERE boatType LIKE ? OR boatEngine LIKE ?");
        $params = [$find.'%', $find.'%'];
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

function printJettyResultsetToHTMLTable($res)
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
            <th>postion</th>
            <th>boatType</th>
            <th>boatEngine</th>
            <th>boatLength</th>
            <th>boatWidth</th>
            <th>ownerName</th>
        </tr>
        $rows
        </table>

EOD;
    } else {
        echo "<p>Sorry, nothing found!</p>";
    }
}
