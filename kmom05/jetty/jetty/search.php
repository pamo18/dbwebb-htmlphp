<h1>Search the contents of the Jetty database</h1>

<?php
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $res = searchDB($_POST['search']);
} else {
    $search = null;
    $res = null;
}
?>

<form method="POST" action="?page=search">
    <input type="search" name="search" placeholder="Type first % for wildcard?" value="<?=$search?>">
    <input type="submit" value="Search">
</form>

<?php

if ($res) {
    printJettyResultsetToHTMLTable($res);
    echo "<p><a href=?page=search>Clear and start again</a></p>";
} else {
    echo "<p>What do you want to search for?</p>";
}

if (($search != null) && (($res  == null ))) {
    echo "<p>Sorry, nothing found!</p>";
}
