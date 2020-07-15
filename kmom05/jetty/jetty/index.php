<h1>Jetty database contents</h1>

<?php
$db = connectToDatabase($jettdb);
$stmt = $db->prepare("SELECT * FROM jetty");
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
printJettyResultsetToHTMLTable($res);
?>
