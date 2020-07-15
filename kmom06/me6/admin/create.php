<?php login_check() ?>

<h1>Add a movie</h1>
<form method="post" action="?page=create-process">
    <fieldset>
        <legend>Add</legend>
        <p><label>Position<br><input type="number" name="Position"></label></p>
        <p><label>Title<br><input type="text" name="Title"></label></p>
        <p><label>Year<br><input type="number" name="Year"></label></p>
        <p><label>Oscars<br><input type="number" name="Oscars"></label></p>
        <p><label>Rating<br><input step="0.1" name="Rating"></label></p>
        <p><input type="submit" name="add" value="Add"></p>
    </fieldset>
</form>

<?php

$db = connectToDatabase($DBmovies);
$sql = "SELECT * FROM movies ORDER BY Position ASC";
$stmt = $db->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
makeMovieTable($res);
?>
