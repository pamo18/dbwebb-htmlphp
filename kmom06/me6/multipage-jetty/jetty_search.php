
<h1>Search the Jetty database</h1>

<?php
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $res = searchJettyDB($_POST['search'], $DBjetty);
} else {
    $search = null;
    $res = null;
}
?>

<form method="POST" action="?page=jetty_search">
    <input type="search" name="search" placeholder="Type first % for wildcard?" value="<?=$search?>">
    <input type="submit" value="Search">
</form>

<?php

if ($search) {
    makeJettyTable($res);
    echo "<p class='table_p'><a href=?page=jetty_search>Clear and start again</a></p>";
} else {
    echo '<p class="table_p">What do you want to search for?</p>';
}
