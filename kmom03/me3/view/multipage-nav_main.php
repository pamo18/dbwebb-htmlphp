<aside>
    <nav class="navbar_main">
        <ul>
        <?php foreach ($pages_me as $key => $value) :
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
