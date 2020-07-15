<?php login_check() ?>

<h1>Databas Admin Sida</h1>

<?php
$db = connectToDatabase($bmoDB);
$stmt = $db->prepare("SELECT * FROM Object ORDER BY id ASC");
$stmt->execute();
$res1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT * FROM Article ORDER BY id ASC");
$stmt->execute();
$res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

makeTableAll($res1, $res2);
?>
