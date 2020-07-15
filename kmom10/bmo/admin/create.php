<?php login_check() ?>

<?php
$table = (isset($_GET["table"]) ? $_GET["table"] : null);
if ($table) {
    if ($table == "Article") {
        echo <<<EOD
        <h1>Lägg till en artikel</h1>
        <form>
            <fieldset>
                <legend align="center">Välj nedan önskad tabell</legend>
                <input type="hidden" name="page" value="create">
                <input type="hidden" name="nav" value="admin">
                <input type="hidden" name="selected" value="create">
                <input type="submit" name="table" value="Article">
                <input type="submit" name="table" value="Object">
            </fieldset>
        </form>
        <form method="post" action="?page=create-process">
            <fieldset>
                <legend align="center">Article</legend>
                <input type="hidden" name="table" value="Article">
                <p><label>id<br><input type="number" name="id"></label></p>
                <p><label>Kategori<br><input type="text" name="category"></label></p>
                <p><label>Titel<br><input type="text" name="title"></label></p>
                <p><label>Innehåll<br><textarea name="content"></textarea></label></p>
                <p><label>Författare<br><input type="text" name="author"></label></p>
                <p><label>Publicerat<br><input type="datetime-local" name="pubdate"></label></p>
                <p><input type="submit" name="add" value="Lägg till"></p>
            </fieldset>
        </form>
EOD;

        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Article ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeTable2($res);
    } elseif ($table == "Object") {
        echo <<<EOD
        <h1>Lägg till en objekt</h1>
        <form>
            <fieldset>
                <legend align="center">Välj nedan önskad tabell</legend>
                <input type="hidden" name="page" value="create">
                <input type="hidden" name="nav" value="admin">
                <input type="hidden" name="selected" value="create">
                <input type="submit" name="table" value="Article">
                <input type="submit" name="table" value="Object">
            </fieldset>
        </form>
        <form method="post" action="?page=create-process">
            <fieldset>
                <legend align="center">Object</legend>
                <input type="hidden" name="table" value="Object">
                <p><label>id<br><input type="number" name="id"></label></p>
                <p><label>Titel<br><input type="text" name="title"></label></p>
                <p><label>Kategori<br><input type="text" name="category"></label></p>
                <p><label>Text<br><textarea name="text"></textarea></label></p>
                <p><label>Bild<br><input type="text" name="image"></label></p>
                <p><label>Ägare<br><input type="text" name="owner"></label></p>
                <p><input type="submit" name="add" value="Lägg till"></p>
            </fieldset>
        </form>
EOD;
        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Object ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeTable($res);
    }
} else {
    echo <<<EOD
    <h1>Lägga till en artikel eller objekt</h1>

    <form>
        <fieldset>
            <legend align="center">Välj nedan önskad tabell</legend>
            <input type="hidden" name="page" value="create">
            <input type="hidden" name="nav" value="admin">
            <input type="hidden" name="selected" value="create">
            <input type="submit" name="table" value="Article">
            <input type="submit" name="table" value="Object">
        </fieldset>
    </form>
EOD;
}
