<?php

if (isset($_POST['update']) && !empty($_POST['Position'])) {
    $position = $_POST['Position'];
    $title  = $_POST['Title'];
    $year = $_POST['Year'];
    $oscars = $_POST['Oscars'];
    $rating  = $_POST['Rating'];
    $params = [$title, $year, $oscars, $rating, $position];
    $db = connectToDatabase($DBmovies);
    $sql = <<<EOD
    UPDATE movies
    SET
        Title = ?,
        Year = ?,
        Oscars = ?,
        Rating = ?
    WHERE
        Position = ?
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
    $res = searchMovieDB($title, $DBmovies, $exact = true);
    makeMovieTable($res);
    echo "<p style='text-align: center'><a href='?page=update'>Continue</a>.</p>";
} else {
    echo "<p>Nothing to update</p>";
    echo "<p style='text-align: center'><a href='?page=update'>Continue</a>.</p>";
}
