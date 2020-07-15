
<h3 class='clear'><a href='?page=objects'>Rensa kategori</a></h3>

<?php
$db = connectToDatabase($bmoDB);

if (!empty($_GET["selected"])) {
    $objectCategory = $_GET["selected"];
    $stmt = $db->prepare("SELECT * FROM Object WHERE category LIKE '{$objectCategory}' ORDER BY id ASC");
} else {
    $stmt = $db->prepare("SELECT * FROM Object ORDER BY id ASC");
}
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
makeTable($res);
