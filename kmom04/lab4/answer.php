<?php

/**
 * @preserve 1505c17816a9e02ce6ae7fc7e35bb17d
 *
 * 1505c17816a9e02ce6ae7fc7e35bb17d
 * htmlphp
 * lab4
 * v2
 * pamo18
 * 2018-09-21 09:51:46
 * v3.1.3 (2018-09-13)
 *
 * Generated 2018-09-21 11:51:46 by dbwebb lab-utility v3.1.3 (2018-09-13).
 * https://github.com/dbwebb-se/lab
 */

// Set error reporting to verbose
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

// Load and create object with lab utilities
require __DIR__ . "/.Dbwebb.php";
$dbwebb = new Dbwebb();



/** ===================================================================
 * Lab 4 - Htmlphp
 *
 * If you need to peek at examples or just want to know more, take a look at
 * the [PHP Manual](http://php.net/manual/en/langref.php).
 *
 * There you will find everything this lab will go through and much more.
 *
 */



/** -------------------------------------------------------------------
 * Section 1 . Basic functions
 *
 *
 *
 */



/**
 * Exercise 1.1 (1 points)
 *
 * Create a function called `sumNumbers()` that should take 2 numbers as
 * arguments and return the sum of them.
 *
 * Answer with a call to the function using the numbers 852 and 68.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function sumNumbers($num1, $num2)
{
    return $num1 + $num2;
}
$result = sumNumbers(852, 68);




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.1", $ANSWER, false);

/**
 * Exercise 1.2 (1 points)
 *
 * Create a function called `sumArray()` that should take an array as argument
 * and return the sum of all items in the array.
 *
 * Answer with a call to the function using the array: `[3,652,9,74,7]`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function sumArray($sum)
{
    return array_sum($sum);
}
$result = sumArray([3,652,9,74,7]);



$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.2", $ANSWER, false);

/**
 * Exercise 1.3 (1 points)
 *
 * Create a function called `modArray()` that should take 2 arguments, an
 * array and a string. Replace the first item in the array with the string and
 * return the array.
 *
 * Answer with a call to the function using the arguments: `[2,134,8,35,5]`
 * and `"onion"`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function modArray($arr, $str)
{
    return array_replace($arr, [0 => $str]);
}
$result = modArray([2,134,8,35,5], "onion");



$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.3", $ANSWER, false);

/**
 * Exercise 1.4 (1 points)
 *
 * Create a function called `printRange()` that should take 2 numbers as
 * arguments, start and stop. The function should add all even numbers between
 * start and stop (not including) to an array and return it.
 *
 * Answer with a call to the function using the arguments: 9 and 27.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function printRange($start, $stop)
{
    $even = [];
    for ($i=$start; $i<$stop; $i++) {
        ($i % 2 == 0 ? array_push($even, $i): false);
    }
    return $even;
}
$result = printRange(9, 27);


$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.4", $ANSWER, false);

/**
 * Exercise 1.5 (1 points)
 *
 * Create a function called `combineArrays()` that takes two arrays as
 * arguments. The function should combine the arrays to one associative array
 * and return it. The first argument is the key and the second argument is the
 * value.
 *
 * Answer with a call to the function using the arguments:
 * `[green,brown,pink,white,gray,blue]` and `[frog,bear,pig,lion,wolf,whale]`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function combineArrays($arr1, $arr2)
{
    return array_combine($arr1, $arr2);
}

$result = combineArrays(["green", "brown", "pink", "white", "gray", "blue"], ["frog", "bear", "pig", "lion", "wolf", "whale"]);


$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.5", $ANSWER, false);

/**
 * Exercise 1.6 (1 points)
 *
 * Create a function called `euroToDollar()` that takes one argument, the euro
 * amount to convert to dollars. Count 1 Euro as 1.261215 dollars. Return the
 * dollar amount of 186 Euros.
 *
 * Answer with the result as a double with 4 decimals.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function euroToDollar($euro)
{
    return round($euro * 1.261215, 4);
}

$result = euroToDollar(186);



$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.6", $ANSWER, false);

/**
 * Exercise 1.7 (1 points)
 *
 * Create a function called `inRange()` that takes one argument. The function
 * should return `true` if the argument is higher than 50 and lower than 100.
 * If the number is out of range, the function should return `false`. The
 * return type should be boolean.
 *
 * Use the argument 46 and answer with a call to the function.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function inRange($num)
{
    return ($num > 50 && $num <100 ? true : false);
}
$result = inRange(46);


$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.7", $ANSWER, false);

/**
 * Exercise 1.8 (1 points)
 *
 * Create a function called `calculateArea()` that takes one argument, the
 * diameter of a circle. The function should return the area of the circle,
 * with 4 decimals.
 *
 * Answer with the result if the diameter is 19. ( hint: `pi()` )
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function calculateArea($diameter)
{
    return round(pi()/4 * pow($diameter, 2), 4);
}
$result = calculateArea(19);


$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.8", $ANSWER, false);

/**
 * Exercise 1.9 (1 points)
 *
 * Create a function called `fibonacci()`. The function should use the
 * [Fibbonacci Sequence](http://en.wikipedia.org/wiki/Fibonacci_number),
 * starting with 1 and 2. Return the sum of all odd numbers in the sequence,
 * when the sequence value dont exceed 1.000.000.
 *
 * Answer with a call of the function. A Fibonacci-sequence can look like
 * this: 1, 2, 3, 5, 8, 13, 21, 34, 55 etc. You add the current value with the
 * last, i.e. `1+2=3, 3+2=5, 5+3=8 etc`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function fibonacci()
{
    $odd = 1;
    $num = 2;
    $last1 = 1;
    for ($i=0; $num<1000000; $i++) {
        $num = $num + $last1;
        $last1 = $num - $last1;
        ($num % 2 == 0 ? $odd += $num : false);
    }
    return $odd;
}


$ANSWER = fibonacci();

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.9", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 2 . Extra assignments
 *
 * These questions are worth 3 points each. Solve them for extra points.
 *
 */



/**
 * Exercise 2.1 (3 points)
 *
 * In this exercises you should use the former functions `sumArray()` and
 * `calculateArea()`. Create a new function called `calculateMany()` that
 * takes an array with numbers as argument. For every number in the array,
 * call `calculateArea()` and store the result in a new array. The last
 * position in your new array should hold the result of a call to the function
 * `calculateArea()` where you pass the sum of the whole array, you passed as
 * argument. All numbers in the resulting array should be rounded up to
 * nearest integer.
 *
 * Answer with a call to `calculateMany()` with the array `37, 28, 34, 24,
 * 10`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
function calculateMany($arr)
{
    $area = [];
    foreach (range(0, count($arr) -1) as $i) {
        array_push($area, intval(ceil(calculateArea($arr[$i]))));
    }
    $areaArray = sumArray($arr);
    array_push($area, intval(ceil(calculateArea($areaArray))));
    return $area;
}
$result = calculateMany([37,28,34,24,10]);

$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.1", $ANSWER, false);


// Wrap it up
exit($dbwebb->exitWithSummary());
