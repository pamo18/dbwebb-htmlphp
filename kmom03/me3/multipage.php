<?php
/**
 * This is a page controller for a multipage. You should name this file
 * as the name of the pagecontroller for this multipage. You should then
 * add a directory with the same name, excluding the file suffix of ".php".
 * You then then have several multipages within the same directory, like this.
 *
 * multipage.php
 * multipage/
 *
 * some-test-page.php
 * some-test-page/
 */
 // Include the configuration file
 require __DIR__ . "/config.php";

 // Include essential functions
 require __DIR__ . "/src/functions.php";

// Get what subpage to show, defaults to index
$pageReference = $_GET["page"] ?? "me";

// Get the filename of this multipage, exkluding the file suffix of .php
$base = basename(__FILE__, ".php");

// Create the collection of valid sub pages.
$pages_me = [
    "me" => [
        "title" => "Me",
        "file" => __DIR__ . "/$base-me/me.php",
        "type" => "main",
        "nav" => "main",
    ],
    "report" => [
        "title" => "Redovisning",
        "file" => __DIR__ . "/$base-me/report.php",
        "type" => "main",
        "nav" => "main",
    ],
    "about" => [
        "title" => "Om",
        "file" => __DIR__ . "/$base-me/about.php",
        "type" => "main",
        "nav" => "main",

    ],
    "intro" => [
        "title" => "Multipage",
        "file" => __DIR__ . "/$base-me/intro.php",
        "type" => "multipage",
        "nav" => "under"
    ]
];

$multipage = [
    "intro" => [
        "title" => "Intro",
        "file" => __DIR__ . "/$base/intro.php",
        "type" => "multipage",
        "nav" => "under",
    ],
    "print-get" => [
        "title" => "\$_GET",
        "file" => __DIR__ . "/$base/print-get.php",
        "type" => "multipage",
        "nav" => "under",
    ],
    "get-samples" => [
        "title" => "Samples",
        "file" => __DIR__ . "/$base/get-samples.php",
        "type" => "multipage",
        "nav" => "under",
    ],
    "print-server" => [
        "title" => "\$_SERVER",
        "file" => __DIR__ . "/$base/print-server.php",
        "type" => "multipage",
        "nav" => "under"
    ],
    "print_server-stats" => [
        "title" => "Stats page",
        "file" => __DIR__ . "/$base/print-server-stats.php",
        "type" => "multipage",
        "nav" => "under"
    ]
];

// Get the current page from the $pages collection, if it matches
$all_pages = array_merge($pages_me, $multipage);
$page = $all_pages[$pageReference] ?? null;

// Base title for all pages and add title from selected multipage
$title = $page["title"] ?? "404";

// Render the page
require __DIR__ . "/view/header.php";
require __DIR__ . "/view/multipage.php";
require __DIR__ . "/view/footer.php";
