
<?php
login_check()
?>

<h1>Jetty database contents</h1>

<?php
$db = connectToDatabase($DBjetty);
$stmt = $db->prepare("SELECT * FROM Jetty");
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
makeJettyTable($res);
?>
