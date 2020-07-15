<?php login_check() ?>

<?php

if (isset($_POST['init'])) {
    $table = $_POST['table'];
    $db = connectToDatabase($bmoDB);
    $sql = <<<EOD
    DROP TABLE IF EXISTS $table;
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($table == "Article") {
        $sql = <<<EOD
        CREATE TABLE `Article` (
            `id`  INTEGER,
            `category`  TEXT,
            `title`    TEXT,
            `content`  TEXT,
            `author`  TEXT,
            `pubdate`  DATETIME
        );
EOD;

    } elseif ($table == "Object") {
        $sql = <<<EOD
        CREATE TABLE `Object` (
            `id`  INTEGER,
            `title`  TEXT,
            `category`  TEXT,
            `text`    TEXT,
            `image`  TEXT,
            `owner`  TEXT
        );
EOD;

    }
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
        echo "<p>The error code: " . $stmt->errorCode();
        echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
        throw $e;
    }
    echo "<h1>Initialisering av {$table} klar!</h1>";
    echo "<p style='text-align: center'><a href='?page=init&selected=init&nav=admin'>Continue</a>.</p>";
}
