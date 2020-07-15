
<?php
if (isset($_GET["search"])) {
    $foundObjects = searchDB($bmoDB, "Object", "title", $_GET["search"], "category", null);
    $foundArticles = searchDB($bmoDB, "Article", "title", $_GET["search"], "content", null);
    echo "<h4>" . count(array_merge($foundObjects, $foundArticles)) . " resultat</h4>";
    ($foundObjects ? showObjectResults($foundObjects) : null);
    ($foundArticles ? showArticleResults($foundArticles) : null);
}
