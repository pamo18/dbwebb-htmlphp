<aside>
    <nav class="multipage">
        <ul>
        <?php foreach ($pages as $key => $value) : ?>
            <?php
            if ($pageReference === $key) {
                $selected = "selected";
            } else {
                $selected = null;
            }
            ?>
            <li><a class="<?=$selected?>" href="?page=<?= $key ?>"><?= $value["title"] ?></a></li>
        <?php endforeach; ?>
        </ul>
    </nav>
</aside>
