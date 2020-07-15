<?php

/**
 * @preserve a13b8ca0198b6a7972ca9008acb6eb7b
 *
 * a13b8ca0198b6a7972ca9008acb6eb7b
 * htmlphp
 * lab2
 * v2
 * pamo18
 * 2018-08-26 09:54:43
 * v3.1.0 (2018-08-17)
 *
 * Generated 2018-08-26 11:54:44 by dbwebb lab-utility v3.1.0 (2018-08-17).
 * https://github.com/dbwebb-se/lab
 */

// Set error reporting to verbose
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

// Load and create object with lab utilities
require __DIR__ . "/.Dbwebb.php";
$dbwebb = new Dbwebb();



/** ===================================================================
 * Lab 2 - htmlphp
 *
 * If you need to peek at examples or just want to know more, take a look at
 * the [PHP manual](http://php.net/manual/en/langref.php).
 *
 * Here you will find everything this lab will go through and much more.
 *
 */



/** -------------------------------------------------------------------
 * Section 1 . Strings and basic string operations
 *
 * The foundation for strings.
 *
 */



/**
 * Exercise 1.1 (1 points)
 *
 * Create a variable called `wordOne` and assign the word `"ice"` to it.
 *
 * Create another variable called `wordTwo` and assign the word `"chicken"` to
 * it.
 *
 * Concatenate the two strings, and separate them by a hyphen `-`, into a new
 * variable called `result`.
 *
 * Answer with the result-variable.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$wordOne = "ice";
$wordTwo = "chicken";
$result = $wordOne . "-" . $wordTwo;





$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.1", $ANSWER, false);

/**
 * Exercise 1.2 (1 points)
 *
 * Create a variable, `floatNumber`, and assign the value 82.96. Concatenate
 * your variable `wordOne` with your variable `floatNumber`, separate the
 * words with a `=`. Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$floatNumber = 82.96;
$result = $wordOne ."=" . $floatNumber;





$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.2", $ANSWER, false);

/**
 * Exercise 1.3 (1 points)
 *
 * Create a variable, `intNumber`, and assign the value 187. Concatenate your
 * variable `intNumber` with your variable `wordTwo`, separate the words with
 * a space. Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$intNumber = 187;
$result = $intNumber . " " . $wordTwo;




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.3", $ANSWER, false);

/**
 * Exercise 1.4 (1 points)
 *
 * Create the string: `"There are 187 chicken's doing some ice."` by combining
 * pure text with the values of your variables `wordOne`, `wordTwo` and
 * `intNumber`. Store the resulting text in a variable `sentence`. Answer with
 * the variable.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$sentence = "There are " .$intNumber . " " . $wordTwo . "'s " . "doing some " . $wordOne . ".";





$ANSWER = $sentence;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.4", $ANSWER, false);

/**
 * Exercise 1.5 (1 points)
 *
 * Use `strlen()` to find the length of the variable `sentence`. Answer with
 * the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$result = strlen($sentence);




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.5", $ANSWER, false);

/**
 * Exercise 1.6 (1 points)
 *
 * Use `substr()` to find the character at index 0 in the word `"bank"`.
 * Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$result = substr("bank", 0, 1);





$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.6", $ANSWER, false);

/**
 * Exercise 1.7 (1 points)
 *
 * Use `substr()` to find the two characters at index 3 and 4 in the word
 * `"badger"`. Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$result =substr("badger", 3, 2);





$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.7", $ANSWER, false);

/**
 * Exercise 1.8 (1 points)
 *
 * Use `strpos()` to find the first matching index of the character `c` in the
 * word `"camel"`. Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$result = strpos("camel", "c");




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.8", $ANSWER, false);

/**
 * Exercise 1.9 (1 points)
 *
 * Use `strpos()` to find the first matching, (if any), index of the
 * characters `xyz` in the word `"camel"`. Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$result = strpos("camel", "xyz");





$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("1.9", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 2 . Conditions, booleans, if, else and else if
 *
 *
 *
 */



/**
 * Exercise 2.1 (1 points)
 *
 * Store the boolean result of the test: `340 is less than 114` in a variable.
 * Answer with the variable.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$result = 340 < 114;





$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.1", $ANSWER, false);

/**
 * Exercise 2.2 (1 points)
 *
 * Answer with the boolean value of: `115 is larger than 100`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$result = 115> 100;




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.2", $ANSWER, false);

/**
 * Exercise 2.3 (1 points)
 *
 * Sum up the numbers: 2, 5, 3, 8 and 5. Save the result in a variable called
 * `totalSum`.
 *
 * Create an if/elseif-statement to see if `totalSum` is higher, lower or
 * equal to 31.
 *
 * Answer with the corresponding result as a string: `"higher"`, `"lower"`,
 * `"equal"`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$totalSum = 2 + 5 + 3 + 8 + 5;

if ($totalSum == 31) {
    $result = "equal";
} elseif ($totalSum < 31) {
    $result = "lower";
} else {
    $result = "higher";
}


$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.3", $ANSWER, false);

/**
 * Exercise 2.4 (1 points)
 *
 * Create an if-statement that checks if a value is between (or equal to) 27
 * and  37. Use the variable `totalSum` from last exercise to test the
 * if-statement. Answer with a boolean `true` if the value is between the
 * values, otherwise respond with `false`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
if ($totalSum >= 27 && $totalSum <= 37) {
    $result = true;
} else {
    $result = false;
}




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("2.4", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 3 . Iteration and loops
 *
 * For-loops and while-loops.
 *
 */



/**
 * Exercise 3.1 (1 points)
 *
 * Create a while-loop that adds 4 to the number 60, 31 times. Use variables
 * to store the numbers. Answer with the result.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$num = 60;
$i = 0;

for ($i; $i <31; $i++) {
    $num += 4;
}





$ANSWER = $num;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.1", $ANSWER, false);

/**
 * Exercise 3.2 (1 points)
 *
 * Create a while-loop that subtracts 5.46 from the number 939 until the
 * number is between (not equal to) 42 and 52. Answer with the final result as
 * a float, rounded to 2 decimals.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$num = 939;
while ($num > 52) {
        $num -= 5.46;
}

$result = round($num, 2);




$ANSWER = $result;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.2", $ANSWER, false);

/**
 * Exercise 3.3 (1 points)
 *
 * Create a for-loop that iterates from 0 to (including) 18. Add the integer
 * value for each iteration to a string and separate each item with a `,`
 * (comma). Answer with the final string without an ending `,`.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */
$word = "";
for ($i = 0; $i <= 18; $i++) {
    if ($i < 18) {
        $word = $word . ("$i,");
    } else {
        $word = $word .("$i");
    }
}





$ANSWER = $word;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("3.3", $ANSWER, false);

/** -------------------------------------------------------------------
 * Section 4 . Extra assignments
 *
 * These questions are worth 3 points each. Solve them for extra points.
 *
 */



/**
 * Exercise 4.1 (3 points)
 *
 * Create a for-loop that goes through (and including) the numbers 42 to 52.
 * If the current number is even, you should multiply it with PI and add it to
 * a variable `res`. If the current number is odd, you should subtract the
 * square root of it, from the variable `res`. If the current number ends with
 * a zero, then ignore it. Answer with the final result of `res` and round it
 * to the nearest higher integer value.
 *
 * Write your code below and put the answer into the variable ANSWER.
 */

$a = 42;
$b = 52;
$res = 0;


for ($i = $a; $i <= $b; $i++) {
    if ($i == 50) {
        continue;
    } elseif ($i % 2 == 0) {
        $res += $i * pi();
    } else {
        $res -= sqrt($i);
    }
}

$res = intval(ceil($res));

$ANSWER = $res;

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("4.1", $ANSWER, false);


// Wrap it up
exit($dbwebb->exitWithSummary());
