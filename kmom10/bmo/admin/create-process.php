<?php login_check() ?>

<?php

if (isset($_POST['add']) && !empty($_POST['id'])) {
    if ($_POST['table'] == "Article") {
        $id = $_POST['id'];
        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Article ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $contents = $stmt->fetchAll(PDO::FETCH_BOTH);
        if ((in_array($id, array_column($contents, 'id')) !== false)) {
            $match = array_search($id, array_column($contents, 'id'));
            $fromMatch = array_slice($contents, $match);
            $rFromMatch = array_reverse($fromMatch);
            foreach ($rFromMatch as $item) {
                $currentPos = $item["id"];
                $newPos = $item["id"]+1;
                $db = connectToDatabase($bmoDB);
                $sql = "UPDATE Article SET id = $newPos WHERE id = $currentPos";
                $stmt = $db->prepare($sql);
                $stmt->execute();
            }
        }
        $category  = $_POST['category'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author  = $_POST['author'];
        $pubdate  = $_POST['pubdate'];
        $params = [$id, $category, $title, $content, $author, $pubdate];
        $db = connectToDatabase($bmoDB);
        $sql = "INSERT INTO Article VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo "<p>Failed to insert a new row, dumping details for debug.</p>";
            echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
            echo "<p>The error code: " . $stmt->errorCode();
            echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
            throw $e;
        }
        echo "<h1>Successfuly created!</h1>";
        $res = searchDB($bmoDB, "Article", "id", $id);
        makeTable2($res);
        echo "<p style='text-align: center'><a href='?page=create&table=Article&selected=create&nav=admin'>Continue</a>.</p>";
    } else {
        $id = $_POST['id'];
        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Object ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $contents = $stmt->fetchAll(PDO::FETCH_BOTH);
        if ((in_array($id, array_column($contents, 'id')) !== false)) {
            $match = array_search($id, array_column($contents, 'id'));
            $fromMatch = array_slice($contents, $match);
            $rFromMatch = array_reverse($fromMatch);
            foreach ($rFromMatch as $item) {
                $currentPos = $item["id"];
                $newPos = $item["id"]+1;
                $db = connectToDatabase($bmoDB);
                $sql = "UPDATE Object SET id = $newPos WHERE id = $currentPos";
                $stmt = $db->prepare($sql);
                $stmt->execute();
            }
        }
        $title  = $_POST['title'];
        $category = $_POST['category'];
        $text = $_POST['text'];
        $image  = $_POST['image'];
        $owner  = $_POST['owner'];
        $params = [$id, $title, $category, $text, $image, $owner];
        $db = connectToDatabase($bmoDB);
        $sql = "INSERT INTO Object VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo "<p>Failed to insert a new row, dumping details for debug.</p>";
            echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
            echo "<p>The error code: " . $stmt->errorCode();
            echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
            throw $e;
        }
        echo "<h1>Successfuly created!</h1>";
        $res = searchDB($bmoDB, "Object", "id", $id);
        makeTable($res);
        echo "<p style='text-align: center'><a href='?page=create&table=Object&selected=create&nav=admin'>Continue</a>.</p>";
    }
} else {
    echo "<p>Nothing to add</p>";
    echo "<p style='text-align: center'><a href='?page=create&selected=create&nav=admin'>Continue</a>.</p>";
}
