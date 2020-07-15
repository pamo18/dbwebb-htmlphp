<?php
/**
 * Configuration file with common settings.
 */
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors



// Start the named session
$name = preg_replace("/[^a-z\d]/i", "", __DIR__);
session_name($name);
session_start();



// Create an array of the valid users
$styles = [
    "default" => "css/light.css",
    "light" => "css/light.css",
    "color" => "css/color.css",
    "dark" => "css/dark.css",
];
