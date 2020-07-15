<?php login_check() ?>

<?php

if (isset($_POST['update']) && !empty($_POST['id'])) {
    if ($_POST['table'] == "Article") {
        $id = $_POST['id'];
        $category  = $_POST['category'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author  = $_POST['author'];
        $pubdate  = $_POST['pubdate'];
        $params = [$category, $title, $content, $author, $pubdate, $id];
        $db = connectToDatabase($bmoDB);
        $sql = <<<EOD
        UPDATE Article
        SET
            category = ?,
            title = ?,
            content = ?,
            author = ?,
            pubdate = ?
        WHERE
            id = ?
EOD;
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
            echo "<p>The error code: " . $stmt->errorCode();
            echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
            throw $e;
        }
        echo "<h1>Successfuly updated!</h1>";
        $res = searchDB($bmoDB, "Article", "id", $id);
        makeTable2($res);
        echo "<p style='text-align: center'><a href='?page=update&table=Article&selected=update&nav=admin'>Continue</a>.</p>";
    } else {
        $id = $_POST['id'];
        $title  = $_POST['title'];
        $category = $_POST['category'];
        $text = $_POST['text'];
        $image  = $_POST['image'];
        $owner  = $_POST['owner'];
        $params = [$title, $category, $text, $image, $owner, $id];
        $db = connectToDatabase($bmoDB);
        $sql = <<<EOD
        UPDATE Object
        SET
            title = ?,
            category = ?,
            text = ?,
            image = ?,
            owner = ?
        WHERE
            id = ?
EOD;
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
            echo "<p>The error code: " . $stmt->errorCode();
            echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
            throw $e;
        }
        echo "<h1>Successfuly updated!</h1>";
        $res = searchDB($bmoDB, "Object", "id", $id);
        makeTable($res);
        echo "<p style='text-align: center'><a href='?page=update&table=Object&selected=update&nav=admin'>Continue</a>.</p>";
    }
} else {
    echo "<p>Nothing to update</p>";
    echo "<p style='text-align: center'><a href='?page=update&selected=update&nav=admin'>Continue</a>.</p>";
}
