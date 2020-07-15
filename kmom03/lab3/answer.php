<?php

/**
 * @preserve 1fe1128fc94e3e6c0916e9408b69ba80
 *
 * 1fe1128fc94e3e6c0916e9408b69ba80
 * htmlphp
 * lab3
 * v2
 * pamo18
 * 2018-08-26 09:55:15
 * v3.1.0 (2018-08-17)
 *
 * Generated 2018-08-26 11:55:15 by dbwebb lab-utility v3.1.0 (2018-08-17).
 * https://github.com/dbwebb-se/lab
 */

// Set error reporting to verbose
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

// Load and create object with lab utilities
require __DIR__ . "/.Dbwebb.php";
$dbwebb = new Dbwebb();



/** ===================================================================
 * Lab 3 - Htmlphp
 *
 * If you need to peek at examples or just want to know more, take a look at
 * the [PHP Manual](http://php.net/manual/en/langref.php).
 *
 * There you will find everything this lab will go through and much more.
 *
 */



/** -------------------------------------------------------------------
 * Section 1 . Arrays - with numeric index
 *
 *
 *
 */



/**
 * Exercise 1.1 (1 points)
 *
 * Create an array, called `countries` with the items: `[Russia, France,
 * Norway]`.
 *
 * Answer with the second item in the array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$countries = ["Russia", "France", "Norway"];




$ANSWER = $countries[1];

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.1", $ANSWER, false);

/**
 * Exercise 1.2 (1 points)
 *
 * Create a new array called `capitals` with the items: `[Moscow, Paris,
 * Oslo]`.
 *
 * Answer with a string containing each country from the `countries`-array
 * followed by the corresponding capital. Use the format `"country = capital,
 * country = capital..."`
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$i = 0;
$capitals = ["Moscow", "Paris", "Oslo"];
$cc ="";

foreach ($countries as $c) {
    if ($i <2) {
        $cc .= "$c = $capitals[$i], ";
    } else {
        $cc .= "$c = $capitals[$i]";
    }
    $i++;
}




$ANSWER = $cc;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.2", $ANSWER, false);

/**
 * Exercise 1.3 (1 points)
 *
 * Create an array, called `numbers1` with the items: `[324, 36, 20.02, 8,
 * 4998]`. Answer with the sum of the first two items.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$numbers1 = [324, 36, 20.02, 8, 4998];




$ANSWER = $numbers1[0] + $numbers1[1];

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.3", $ANSWER, false);

/**
 * Exercise 1.4 (1 points)
 *
 * Use your arrays `numbers1` and `capitals` to change item at index 4 in
 * `numbers1` to the item at index 2 in `capitals`. Answer with the array
 * `numbers1`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */


$numbers1[4] = $capitals[2];



$ANSWER = $numbers1;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.4", $ANSWER, false);

/**
 * Exercise 1.5 (1 points)
 *
 * Use your array `countries` and concatenate the first and the last item as a
 * string. Separate the items with a hyphen `-` and answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$result = reset($countries) . "-" . end($countries);




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.5", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 2 . Arrays - with keys
 *
 *
 *
 */



/**
 * Exercise 2.1 (1 points)
 *
 * Use your `countries` and `capitals` arrays and create another array called
 * `keyArray`. The country should be the key and the capital should be the
 * value. Answer with the new array. (hint: `"country" => "capital"`)
 *
 * Write your code below and put the answer into the variable ANSWER.
 */


$keyArray = array_combine($countries, $capitals);





$ANSWER = $keyArray;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.1", $ANSWER, false);

/**
 * Exercise 2.2 (1 points)
 *
 * Add the key `"Mexico"` with the value `"Mexico City"` to your `keyArray`.
 * Answer with the updated array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$keyArray["Mexico"] = "Mexico City";




$ANSWER = $keyArray;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.2", $ANSWER, false);

/**
 * Exercise 2.3 (1 points)
 *
 * Answer with the value for the key `"Russia"`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */






$ANSWER = $keyArray["Russia"];

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.3", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 3 . Arrays - built-in functions
 *
 *
 *
 */



/**
 * Exercise 3.1 (1 points)
 *
 * Find the number of items in the array `[324, 36, 20.02, 8, 4998]`. Answer
 * with the result as an integer.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */


$numbers1 = [324, 36, 20.02, 8, 4998];



$ANSWER = count($numbers1);

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.1", $ANSWER, false);

/**
 * Exercise 3.2 (1 points)
 *
 * Sort the array `[324, 36, 20.02, 8, 4998]` in decending order. Make sure
 * that it does maintain the key association. Answer with the sorted array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

arsort($numbers1);



$ANSWER = $numbers1;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.2", $ANSWER, false);

/**
 * Exercise 3.3 (1 points)
 *
 * Use `pop()` on the array `[324, 36, 20.02, 8, 4998]` and answer with the
 * popped item.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$numbers2 = [324, 36, 20.02, 8, 4998];




$ANSWER = array_pop($numbers2);

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.3", $ANSWER, false);

/**
 * Exercise 3.4 (1 points)
 *
 * Use `push()` on the array `[285, 11, 9.75, 9, 2216]` and insert the number
 * 7. Answer with the resulting array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$numbers3 =[285, 11, 9.75, 9, 2216];

array_push($numbers3, 7);


$ANSWER = $numbers3;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.4", $ANSWER, false);

/**
 * Exercise 3.5 (1 points)
 *
 * Copy your array `countries` to a new array called `newArray`. Use `shift()`
 * on the new array and answer with the shifted item.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$newArray = $countries;

$shifted = array_shift($newArray);


$ANSWER = $shifted;


// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.5", $ANSWER, false);

/**
 * Exercise 3.6 (1 points)
 *
 * Use `unshift()` on your `newArray` add the items `"North Dakota"` and
 * `"Montana"` in the beginning of the array. Answer with the modified array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

array_unshift($newArray, "North Dakota", "Montana");




$ANSWER = $newArray;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.6", $ANSWER, false);

/**
 * Exercise 3.7 (1 points)
 *
 * Reverse the order of the array `[324, 36, 20.02, 8, 4998]`. Answer with the
 * modified array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$numbers4 = [324, 36, 20.02, 8, 4998];

$numbers_rev = array_reverse($numbers4);



$ANSWER = $numbers_rev;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.7", $ANSWER, false);

/**
 * Exercise 3.8 (1 points)
 *
 * Use `implode()` on your `capital`-array and answer with a string where each
 * item is separated by a hyphen `-`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$imploded_caps = implode("-", $capitals);




$ANSWER = $imploded_caps;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.8", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 4 . Arrays - for-each loop
 *
 *
 *
 */



/**
 * Exercise 4.1 (1 points)
 *
 * Create an array, called `numbers1` with the items: `[21, 5, 4, 6, 76, 2,
 * 18, 85, 55, 1]`. Use a for-each loop to sum each item with 9 and put them
 * in a new array called `summedNumbers1`. Answer with the new array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$numbers1 = [21, 5, 4, 6, 76, 2, 18, 85, 55, 1];
$summedNumbers1 = [];
foreach ($numbers1 as $number) {
    $number += 9;
    $summedNumbers1[] = $number;
}



$ANSWER = $summedNumbers1;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("4.1", $ANSWER, false);

/**
 * Exercise 4.2 (1 points)
 *
 * Create a new array called `numbers2` with the items `[11, 4, 41, 67, 99,
 * 22, 8, 83, 5, 16]`. Use at least a for-each loop to add all numbers larger
 * than 20 to a new array called `largeNumbers`. Answer with the new array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$numbers2 = [11, 4, 41, 67, 99, 22, 8, 83, 5, 16];
$largeNumbers = [];
foreach ($numbers2 as $number) {
    if ($number > 20) {
        $largeNumbers[] = $number;
    }
}



$ANSWER = $largeNumbers;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("4.2", $ANSWER, false);

/**
 * Exercise 4.3 (1 points)
 *
 * Create an array with the keys: `"one"`, `"two"`, `"three"`, `"four"` and
 * `"five"` and the values: 1, 2, 3, 4, 5. Use a foreach-loop to add all keys
 * and values to an array in the format: `["key"=value, "key"=value, etc]`.
 * Use `implode()` to make the answer a string with all items separated by a
 * comma `,`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$new_array = [
     "one" => 1,
     "two" => 2,
     "three" => 3,
     "four" => 4,
     "five" => 5
];

 $new_array2 = [];

foreach ($new_array as $key => $value) {
    $new_array2[] = "$key=$value";
}
$implode_new2 = implode(",", $new_array2);



$ANSWER = $implode_new2;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("4.3", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 5 . Switch-case
 *
 * [PHP Manual about
 * switch](http://se1.php.net/manual/en/control-structures.switch.php)
 *
 */



/**
 * Exercise 5.1 (1 points)
 *
 * Create a switch-case statement to decide which continent a certain country
 * resides in. Use the countries: `"Sweden, Brazil, China, Australia, Canada"`
 * and the continents:
 *     `"Europe, South America, Asia, Oceania, North America"`.
 *
 * Answer with a test on the country: `"China"`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$country = "China";

$countries = ["Sweden", "Brazil", "China", "Australia", "Canada"];
$continents = ["Europe", "South America", "Asia", "Oceania", "North America"];

$continent[$countries[0]] = $continents[0];
$continent[$countries[1]] = $continents[1];
$continent[$countries[2]] = $continents[2];
$continent[$countries[3]] = $continents[3];
$continent[$countries[4]] = $continents[4];

$ANSWER = $continent[$country];

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("5.1", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 6 . Extra assignments
 *
 * These questions are worth 3 points each. Solve them for extra points.
 *
 */



/**
 * Exercise 6.1 (3 points)
 *
 * A switch-case statement can handle multiple cases with the same result.
 * Create a new switch-case statement that decides which is the corresponding
 * continent. Use the countries: `"Sweden, Denmark, Finland, Brazil, China,
 * Australia, Canada"` and the continents: `"Europe, South America, Asia,
 * Oceania, North America"`.
 *
 * Answer with a test on the country: `"Finland"`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$country2 = "Finland";

$countries2 = ["Sweden", "Denmark", "Finland", "Brazil", "China", "Australia", "Canada"];
$continents2 = ["Europe", "South America", "Asia", "Oceania", "North America"];

$continent2[$countries2[0]] = $continents2[0];
$continent2[$countries2[1]] = $continents2[0];
$continent2[$countries2[2]] = $continents2[0];
$continent2[$countries2[3]] = $continents2[1];
$continent2[$countries2[4]] = $continents2[2];
$continent2[$countries2[5]] = $continents2[3];
$continent2[$countries2[6]] = $continents2[4];





$ANSWER = $continent2[$country2];

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("6.1", $ANSWER, false);

/**
 * Exercise 6.2 (3 points)
 *
 * Sort the array `[285, 11, 9.75, 9, 2216]` in ascending order. Make sure
 * that it does not maintain the key association. Answer with the sorted
 * array.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$my_array = [285, 11, 9.75, 9, 2216];
sort($my_array);




$ANSWER = $my_array;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("6.2", $ANSWER, false);


// Wrap it up
exit($dbwebb->exitWithSummary());
