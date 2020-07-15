
<aside>
    <nav class="navbar_main">
        <ul>
        <?php foreach ($main_pages as $key => $value) :
            $underNavRequired = (isset($_GET["nav"]) ? $_GET["nav"] : "no");
            if ($pageReference === $key || $value["under_nav"] == $underNavRequired) {
                $selected_main = "selected";
            } else {
                $selected_main = null;
            } ?>

            <li><a class="<?=$selected_main?>" href="?page=<?= $key ?>"><?= $value["title"] ?></a></li>

        <?php endforeach; ?>
        </ul>
    </nav>
</aside>
