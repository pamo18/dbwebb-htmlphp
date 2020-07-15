
<?php
(!empty($_GET["articleView"]) ? $articleView = $_GET["articleView"] : $articleView = null);

if ($articleView) {
    makeArticleView($bmoDB, getArticle($bmoDB, $articleView));
    echo "<br><a class='tillbaka' style='font-size:1.5em;' href='?page=articles'>Tillbaka</a>";
} else {
    makeArticles(getArticles($bmoDB, "Article"));
}
