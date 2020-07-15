<?php login_check() ?>

<?php

$db = connectToDatabase($DBmovies);
$position = isset($_GET['Position'])
    ? $_GET['Position']
    : null;

$title = null;
$year = null;
$oscars = null;
$rating = null;

if ($position) {
    $sql = "SELECT * FROM movies WHERE Position = ?";
    $stmt = $db->prepare($sql);
    $params = [$position];
    $stmt->execute($params);
    $res = $stmt->fetchAll(PDO::FETCH_BOTH);

    if (empty($res)) {
        die("Position unkown.");
    }
    // Move content of array to individual variables, for ease of use.
    list($position, $title, $year, $oscars, $rating) = $res[0];
}
?>

<h1>Update a movie</h1>
<form method="post" action="?page=update-process">
    <fieldset>
        <legend>Update</legend>
        <p><label>Position<br><input type="number" name="Position" value="<?=$position?>" readonly></label></p>
        <p><label>Title<br><input type="text" name="Title" value="<?=$title?>"></label></p>
        <p><label>Year<br><input type="number" name="Year" value="<?=$year?>"></label></p>
        <p><label>Oscars<br><input type="number" name="Oscars" value="<?=$oscars?>"></label></p>
        <p><label>Rating<br><input step="0.1" name="Rating" value="<?=$rating?>"></label></p>
        <p><input type="submit" name="update" value="Update"></p>
    </fieldset>
</form>

<?php
$db = connectToDatabase($DBmovies);
$stmt = $db->prepare("SELECT * FROM movies ORDER BY Position ASC");
$stmt->execute();
$page = "?page=update";
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
makeUpdateTable($res, $page);
?>
