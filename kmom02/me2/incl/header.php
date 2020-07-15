<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <header class="site-header">
        <img src="img/logo.jpg" alt="logo" class="logo"/>
        <span class="site-title">Me-Sida för Paul Moreland</span>
        <span class="site-slogan">Who am i?</span>
    </header>

<?php
$uri = $_SERVER["REQUEST_URI"];
$uriFile = basename($uri);
?>

    <nav class="navbar">
        <a class="<?= $uriFile == "me.php" ? "selected" : ""; ?>" href="me.php">Hem</a>
        <a class="<?= $uriFile == "report.php" ? "selected" : ""; ?>" href="report.php">Redovisning</a>
        <a class="<?= $uriFile == "about.php" ? "selected" : ""; ?>" href="about.php">Om</a>
    </nav>
