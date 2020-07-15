<?php login_check() ?>

<h1>Initialize Database</h1>
<form method="post" action="?page=init-process">
    <fieldset>
        <p><label>The database below will be deleted!</label></p>
        <input type="submit" name="init" value="Initalize">
    </fieldset>

<?php
$db = connectToDatabase($DBmovies);
$sql = "SELECT * FROM movies ORDER BY Position ASC";
$stmt = $db->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
makeMovieTable($res);
?>
