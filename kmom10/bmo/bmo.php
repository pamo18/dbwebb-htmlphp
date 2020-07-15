<?php
//Multisida kontroller till BMO

 // Include the configuration file
require __DIR__ . "/config.php";
// Include essential functions
require __DIR__ . "/src/functions.php";
// Get what subpage to show, defaults to index
$pageReference = $_GET["page"] ?? "home";
// Get the filename of this multipage, exkluding the file suffix of .php
$base = basename(__FILE__, ".php");

// Create the collection of valid sub pages.
$main_pages = [
    "home" => [
        "title" => "Hem",
        "file" => __DIR__ . "/$base/home.php",
        "under_nav" => null
    ],
    "gallery" => [
        "title" => "Galleri",
        "file" => __DIR__ . "/$base/gallery.php",
        "under_nav" => null
    ],
    "begravningsseder" => [
        "title" => "Seder & bruk",
        "file" => __DIR__ . "/$base/begravningsseder.php",
        "under_nav" => null
    ],
    "articles" => [
        "title" => "Artiklar",
        "file" => __DIR__ . "/$base/articles.php",
        "under_nav" => null
    ],
    "objects" => [
        "title" => "Objekt",
        "file" => __DIR__ . "/$base/objects.php",
        "under_nav" => "objects"
    ],
    "about" => [
        "title" => "Om",
        "file" => __DIR__ . "/$base/about.php",
        "under_nav" => null
    ],
    "admin" => [
        "title" => "Admin",
        "file" => __DIR__ . "/admin/admin.php",
        "under_nav" => "admin"
    ]
];

$redirect = [
    "process_redirect" => [
        "title" => "Process Redirect",
        "file" => __DIR__ . "/$base/process_redirect.php",
        "under_nav" => null
    ],
    "search" => [
        "title" => "Sök resultat",
        "file" => __DIR__ . "/$base-search/search.php",
        "under_nav" => null
    ]
];

$login_page = [
    "login" => [
        "title" => "Logga in",
        "file" => __DIR__ . "/admin/login.php",
        "under_nav" => null
    ],
    "login-process" => [
        "title" => "Logga in",
        "file" => __DIR__ . "/admin/login-process.php",
        "under_nav" => null
    ]
];

$adminPages = [
    "update" => [
        "title" => "Update",
        "file" => __DIR__ . "/admin/update.php",
        "under_nav" => "admin"
    ],
    "create" => [
        "title" => "Create",
        "file" => __DIR__ . "/admin/create.php",
        "under_nav" => "admin"
    ],
    "delete" => [
        "title" => "Delete",
        "file" => __DIR__ . "/admin/delete.php",
        "under_nav" => "admin"
    ],
    "init" => [
        "title" => "Init",
        "file" => __DIR__ . "/admin/init.php",
        "under_nav" => "admin"
    ],
    "update-process" => [
        "title" => "Update Process",
        "file" => __DIR__ . "/admin/update-process.php",
        "under_nav" => null
    ],
    "create-process" => [
        "title" => "Create Process",
        "file" => __DIR__ . "/admin/create-process.php",
        "under_nav" => null
    ],
    "delete-process" => [
        "title" => "Delete Process",
        "file" => __DIR__ . "/admin/delete-process.php",
        "under_nav" => null
    ],
    "init-process" => [
        "title" => "Init Process",
        "file" => __DIR__ . "/admin/init-process.php",
        "under_nav" => null
    ]
];
/*------------------------------------------------------------------------------*/
/*Second Navbar at the top of the page article*/
/*------------------------------------------------------------------------------*/
$objectCategories = [
    "Begravningskonfekt" => [
        "title" => "Begravningskonfekt",
        "link" => "?page=objects&selected=Begravningskonfekt",
        "main_nav" => "objects"
    ],
    "Begravningssked" => [
        "title" => "Begravningssked",
        "link" => "?page=objects&selected=Begravningssked",
        "main_nav" => "objects"
    ],
    "Begravningstal" => [
        "title" => "Begravningstal",
        "link" => "?page=objects&selected=Begravningstal",
        "main_nav" => "objects"
    ],
    "Begravningsfest" => [
        "title" => "Begravningsfest",
        "link" => "?page=objects&selected=Begravningsfest",
        "main_nav" => "objects"
    ],
    "Inbjudningsbrev" => [
        "title" => "Inbjudningsbrev",
        "link" => "?page=objects&selected=Inbjudningsbrev",
        "main_nav" => "objects"
    ],
    "Minnestavla" => [
        "title" => "Minnestavla",
        "link" => "?page=objects&selected=Minnestavla",
        "main_nav" => "objects"
    ],
    "Pärlkrans" => [
        "title" => "Pärlkrans",
        "link" => "?page=objects&selected=Pärlkrans",
        "main_nav" => "objects"
    ]
];

$adminNav = [
    "create" => [
        "title" => "Skapa",
        "link" => "?page=create&selected=create&nav=admin",
        "main_nav" => "admin"
    ],
    "delete" => [
        "title" => "Radera",
        "link" => "?page=delete&selected=delete&nav=admin",
        "main_nav" => "admin"
    ],
    "update" => [
        "title" => "Uppdatera",
        "link" => "?page=update&selected=update&nav=admin",
        "main_nav" => "admin"
    ],
    "init" => [
        "title" => "Rensa",
        "link" => "?page=init&selected=init&nav=admin",
        "main_nav" => "admin"
    ]
];

$navUnder = array_merge($objectCategories, $adminNav);

// Get the current page from the $pages collection, if it matches
$all_pages = array_merge($main_pages, $redirect, $login_page, $adminPages);
$page = $all_pages[$pageReference] ?? null;

// Base title for all pages and add title from selected multipage
$title = $page["title"] ?? "404";

// Render the page
require __DIR__ . "/view/header.php";
require __DIR__ . "/view/page.php";
require __DIR__ . "/view/footer.php";
