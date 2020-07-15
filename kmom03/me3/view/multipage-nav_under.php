<aside>
    <nav class="navbar_under">
        <ul>
        <?php
        if ($page["type"] == "multipage") {
            $nav_under = $multipage;
        } ?>

        <?php foreach ($nav_under as $key => $value) :
            if ($pageReference === $key) {
                $selected = "selected";
            } else {
                $selected = null;
            } ?>

            <li><a class="<?=$selected?>" href="?page=<?= $key ?>"><?= $value["title"] ?></a></li>
        <?php endforeach; ?>

        </ul>
    </nav>
</aside>
