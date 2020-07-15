<?php login_check() ?>

<?php

$db = connectToDatabase($DBmovies);
if (isset($_GET['Position'])) {
    $position = $_GET['Position'];
    $stmt = $db->prepare("SELECT * FROM movies WHERE Position = ?");
    $params = [$position];
    $stmt->execute($params);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $deleteTitle = $res[0]["Title"];
    $_SESSION["deleteTitle"] = $deleteTitle;
} else {
    $position = null;
}
if ($position) {
    echo <<<EOD
<form method="post" action="?page=delete-process">
    <fieldset>
        <legend>Delete movie</legend>
        <p><label>$deleteTitle<br><input type="hidden" name="position" value="$position" readonly></label></p>
        <p><input type="submit" name="delete" value="Delete"></p>
    </fieldset>
</form>
EOD;
} else {
    echo "<h1>Delete a movie</h1>";
}
$stmt = $db->prepare("SELECT * FROM movies ORDER BY Position ASC");
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$page = "?page=delete";
makeUpdateTable($res, $page, $delete = true);
