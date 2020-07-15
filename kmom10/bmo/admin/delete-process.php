<?php login_check() ?>

<?php

if (isset($_POST['delete'])) {
    $id  = $_POST['id'];
    $toDelete = $_SESSION["deleteTitle"];
    $params = [$id];
    $tabel = $_POST['table'];
    $db = connectToDatabase($bmoDB);
    $sql = <<<EOD
    DELETE FROM {$tabel}
    WHERE
        id = ?
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
        $stmt->execute($params);
    } catch (PDOException $e) {
        echo "<p>Failed to delete the row, dumping details for debug.</p>";
        echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
        echo "<p>The error code: " . $stmt->errorCode();
        echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
        throw $e;
    }
    echo "<h1>Successfuly deleted!</h1>";
    echo "<p style='text-align: center'>$toDelete</p>";
    echo "<p style='text-align: center'><a href='?page=delete&selected=delete&nav=admin'>Continue</a>.</p>";
}
