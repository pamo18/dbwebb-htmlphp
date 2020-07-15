<?php

if (isset($_POST['add']) && !empty($_POST['Position'])) {
    $position = $_POST['Position'];
    $db = connectToDatabase($DBmovies);
    $sql = "SELECT * FROM movies ORDER BY Position ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $contents = $stmt->fetchAll(PDO::FETCH_BOTH);
    if ((in_array($position, array_column($contents, 'Position')) !== false)) {
        $match = array_search($position, array_column($contents, 'Position'));
        $fromMatch = array_slice($contents, $match);
        $rFromMatch = array_reverse($fromMatch);
        foreach ($rFromMatch as $item) {
            $currentPos = $item["Position"];
            $newPos = $item["Position"]+1;
            $db = connectToDatabase($DBmovies);
            $sql = "UPDATE movies SET Position = $newPos WHERE Position = $currentPos";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }
    }
    $title  = $_POST['Title'];
    $year = $_POST['Year'];
    $oscars = $_POST['Oscars'];
    $rating  = $_POST['Rating'];
    $params = [$position, $title, $year, $oscars, $rating];
    $db = connectToDatabase($DBmovies);
    $sql = "INSERT INTO movies VALUES (?, ?, ?, ?, ?)";
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
    $res = searchMovieDB($title, $DBmovies, $exact = true);
    makeMovieTable($res);
    echo "<p style='text-align: center'><a href='?page=create'>Continue</a>.</p>";
} else {
    echo "<p>Nothing to add</p>";
    echo "<p style='text-align: center'><a href='?page=create'>Continue</a>.</p>";
}
