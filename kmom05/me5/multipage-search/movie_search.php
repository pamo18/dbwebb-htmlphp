
<?php
login_check()
?>

<h1>Search the Movies database</h1>

<?php
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $res = searchMovieDB($_POST['search'], $DBmovies);
} else {
    $search = null;
    $res = null;
}
?>

<form method="POST" action="?page=movie_search">
    <input type="search" name="search" placeholder="Type what to search for?" value="<?=$search?>">
    <input type="submit" value="Search">
</form>

<?php

if ($search) {
    makeMovieTable($res);
    echo "<p class='table_p'><a href=?page=movie_search>Clear and start again</a></p>";
} else {
    echo '<p class="table_p">What do you want to search for?</p>';
}
