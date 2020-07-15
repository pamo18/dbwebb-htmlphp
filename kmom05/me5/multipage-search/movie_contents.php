
<?php
login_check()
?>

<h1>Movie database contents</h1>

<?php
$db = connectToDatabase($DBmovies);
$stmt = $db->prepare("SELECT * FROM top10");
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
makeMovieTable($res);
?>
