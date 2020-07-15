
<h1>Search the Movies database</h1>

<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $res = searchMovieDB($search, $DBmovies);
} else {
    $search = null;
    $res = null;
}
?>

<form method="GET">
    <input type="hidden" name="page" value="search">
    <input type="search" name="search" placeholder="Type what to search for?" value="<?=$search?>">
    <input type="submit" value="Search">
</form>

<?php
if ($search) {
    makeMovieTable($res);
    //"page=search&search="=$search
    echo "<p class='table_p'><a href=?page=search>Clear and start again</a></p>";
} else {
    echo '<p class="table_p">What do you want to search for?</p>';
}
?>
