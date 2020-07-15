<?php

if (isset($_POST['init'])) {
    $db = connectToDatabase($DBmovies);
    $sql = <<<EOD
    DROP TABLE IF EXISTS "movies";
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $sql = <<<EOD
    CREATE TABLE `movies` (
        `Position`  INTEGER,
        `Title`  TEXT,
        `Year`    INTEGER,
        `Oscars`    INTEGER,
        `Rating` REAL
    );
EOD;
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
        echo "<p>The error code: " . $stmt->errorCode();
        echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
        throw $e;
    }
    echo "<h1>Successfuly initialised!</h1>";
    echo '<form method="post">
        <fieldset>
            <p><label>Recreate the Movie Database or add new data?</label></p>
            <input type="submit" name="recreate" value="Recreate">
            <input type="submit" name="add" value="New data">
        </fieldset>';
}
if (isset($_POST['recreate'])) {
    $db = connectToDatabase($DBmovies);
    $sql = <<<EOD
    INSERT INTO "movies" VALUES(?, ?, ?, ?, ?);
EOD;
    $stmt = $db->prepare($sql);

    $params = [1,'The Shawshank Redemption','1994',0,9.3];
    $stmt->execute($params);

    $params = [2,'The Godfather','1972',3,9.2];
    $stmt->execute($params);

    $params = [3,'The Godfather: Part II','1974',6,9.0];
    $stmt->execute($params);

    $params = [4,'The Dark Knight','2008',2,9.0];
    $stmt->execute($params);

    $params = [5,'12 Angry Men','1957',0,8.9];
    $stmt->execute($params);

    $params = [6,"Schindler's List",'1993',7,8.9];
    $stmt->execute($params);

    $params = [7,'The Lord of the Rings: The Return of the King','2003',11,8.9];
    $stmt->execute($params);

    $params = [8,'Pulp Fiction','1994',1,8.9];
    $stmt->execute($params);

    $params = [9,'The Good, the Bad and the Ugly','1966',0,8.8];
    $stmt->execute($params);

    $params = [10,'Fight Club','1999',0,8.8];
    $stmt->execute($params);

    $db = connectToDatabase($DBmovies);
    $sql = "SELECT * FROM movies ORDER BY Position ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h1>Recreated: The Movie Databse</h1>";
    makeMovieTable($res);

} elseif (isset($_POST['add'])) {
    $url = "?page=create";
    header("Location: $url");
}
