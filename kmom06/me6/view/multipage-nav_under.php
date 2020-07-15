
<aside>
    <nav class="navbar_under">
        <ul>
        <?php
        if ($page["type"] == "multipage") {
            $nav_under = $multipage;
        } else if ($page["type"] == "session") {
            $nav_under = $pages_session;
        } else if ($page["type"] == "jettyDB") {
            $nav_under = $DBjetty_page;
        } else if ($page["type"] == "movieDB") {
            $nav_under = $DBsearch_page;
        } else if ($page["type"] == "adminDB") {
            $nav_under = $DBadmin_page;
        }
        ?>

        <?php foreach ($nav_under as $key => $value) :
            if ($pageReference === $key) {
                $selected_under = "selected";
            } else {
                $selected_under = null;
            } ?>

            <li><a class="<?=$selected_under?>" href="?page=<?= $key ?>"><?= $value["title"] ?></a></li>
        <?php endforeach; ?>

        </ul>
    </nav>
</aside>
