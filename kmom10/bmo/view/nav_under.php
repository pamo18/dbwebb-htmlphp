
<aside>
    <nav class="navbar_under">
        <ul>
        <?php foreach ($navUnder as $key => $value) :
            $navRequired = (isset($_GET["nav"]) ? $_GET["nav"] : $_GET["page"]);
            if ($navRequired == $value["main_nav"]) {
                if (!empty($_GET["selected"])) {
                    $selected_under = ($key == $_GET["selected"] ? "selected" : null);
                } else {
                    $selected_under = null;
                }
                echo "<li><a class='{$selected_under}' href='{$value['link']}'>{$value['title']}</a></li>";
            } ?>

        <?php endforeach; ?>

        </ul>
    </nav>
</aside>
