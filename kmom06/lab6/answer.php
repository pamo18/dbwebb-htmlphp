<?php

/**
 * @preserve f2cf62c6c9e72f9eb4489068da52789e
 *
 * f2cf62c6c9e72f9eb4489068da52789e
 * htmlphp
 * lab6
 * v2
 * pamo18
 * 2018-10-10 14:56:46
 * v3.1.3 (2018-09-13)
 *
 * Generated 2018-10-10 16:56:46 by dbwebb lab-utility v3.1.3 (2018-09-13).
 * https://github.com/dbwebb-se/lab
 */

// Set error reporting to verbose
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

// Load and create object with lab utilities
require __DIR__ . "/.Dbwebb.php";
$dbwebb = new Dbwebb();



/** ===================================================================
 * Lab 6 - Htmlphp
 *
 * In this lab you will be working with a SQLite database file: `myDB.sqlite`
 * and PDO.
 *
 * Do not forget to check the [PHP Manual on
 * PDO](http://php.net/manual/en/book.pdo.php)
 *
 */



/** -------------------------------------------------------------------
 * Section 1 . Working with SQLite and PDO
 *
 * The database has one table called `people`.
 *
 * The table 'people' has six columns:
 *
 * > `id`, `firstName`, `lastName`, `born`, `cityOfBirth`, `countryOfBirth`.
 *
 */



/**
 * Exercise 1.1 (1 points)
 *
 * Find the firstnames of the people born in England. Answer with an array
 * containing their names.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$dsn = "sqlite:myDB.sqlite";
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "error!";
    throw $e;
}

$sql = "SELECT * FROM people WHERE countryOfBirth = 'England'";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$persons = [];
foreach ($result as $name) {
    array_push($persons, $name['firstName']);
}

$ANSWER = $persons;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.1", $ANSWER, false);

/**
 * Exercise 1.2 (1 points)
 *
 * Find the first name and last name of the person born 1930.
 * Answer with a string in the format: `"Firstname Lastname"`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT * FROM people WHERE born = 1930";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$person = $result[0]["firstName"] . " " . $result[0]["lastName"];

$ANSWER = $person;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.2", $ANSWER, false);

/**
 * Exercise 1.3 (1 points)
 *
 * Sum the years the persons with the lastnames `Hepburn` and `Aniston` were
 * born. Answer with an integer.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT * FROM people WHERE lastName LIKE ? OR lastName LIKE ?";
$params = ["Hepburn", "Aniston"];
$stmt = $db->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
$person = intval($result[0]["born"]) + intval($result[1]["born"]);


$ANSWER = $person;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.3", $ANSWER, false);

/**
 * Exercise 1.4 (1 points)
 *
 * Count the number of entries in the table `people`. Answer with an integer.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT * FROM people";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result_l = count($result);

$ANSWER = $result_l;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.4", $ANSWER, false);

/**
 * Exercise 1.5 (1 points)
 *
 * Find which country `(countryOfBirth)` the oldest person was born in. Answer
 * with a string.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT * FROM people ORDER BY born ASC";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$person = $result[0]["countryOfBirth"];


$ANSWER = $person;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.5", $ANSWER, false);

/**
 * Exercise 1.6 (1 points)
 *
 * What is the average value of the column `born`? Answer with an integer.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT born FROM people";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$average = 0;
$count = 0;
foreach ($result as $age) {
    $average += $age["born"];
    $count +=1;
}
$average = intval($average / $count);
$ANSWER = $average;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.6", $ANSWER, false);

/**
 * Exercise 1.7 (1 points)
 *
 * Find the youngest person born in USA. Which city is he/she born in? Answer
 * with a string.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT * FROM people WHERE countryOfBirth = 'USA' ORDER BY born DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$person = $result[0]["cityOfBirth"];

$ANSWER = $person;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.7", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 2 . Extra assignments
 *
 * These questions are worth 3 points each. Solve them for extra points.
 *
 */



/**
 * Exercise 2.1 (3 points)
 *
 * Get the first name and lastname of all persons in the database. Order them
 * by their last name, alphabetically and ascending.
 *
 * Answer with an array of strings, like this:
 *
 * > `["lastName firstName", "lastName firstName"]`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sql = "SELECT * FROM people ORDER BY lastName ASC";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$person = [];
foreach ($result as $key) {
    array_push($person, $key["lastName"] . " " . $key["firstName"]);
}


$ANSWER = $person;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.1", $ANSWER, false);


// Wrap it up
exit($dbwebb->exitWithSummary());
