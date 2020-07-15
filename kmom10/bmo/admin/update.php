<?php login_check() ?>

<?php
$table = (isset($_GET["table"]) ? $_GET["table"] : null);
if ($table) {
    if ($table == "Article") {
        $db = connectToDatabase($bmoDB);
        $id = isset($_GET['id'])
            ? $_GET['id']
            : null;

        $catagory = null;
        $title = null;
        $content = null;
        $author = null;
        $pubdate = null;

        if ($id) {
            $sql = "SELECT * FROM Article WHERE id = ?";
            $stmt = $db->prepare($sql);
            $params = [$id];
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_BOTH);

            if (empty($res)) {
                die("id unkown.");
            }
            // Move content of array to individual variables, for ease of use.
            list($id, $catagory, $title, $content, $author, $pubdate) = $res[0];
        }
        echo <<<EOD
        <h1>Uppdatera en Article</h1>
        <form>
            <fieldset>
                <legend align="center">Välj nedan önskad tabell</legend>
                <input type="hidden" name="page" value="update">
                <input type="hidden" name="nav" value="admin">
                <input type="hidden" name="selected" value="update">
                <input type="submit" name="table" value="Article">
                <input type="submit" name="table" value="Object">
            </fieldset>
        </form>
        <form method="post" action="?page=update-process">
            <fieldset>
                <legend align="center">Article</legend>
                <input type="hidden" name="table" value="Article">
                <p><label>id<br><input type="number" name="id" value="$id" readonly></label></p>
                <p><label>Kategori<br><input type="text" name="category" value="$catagory"></label></p>
                <p><label>Titel<br><input type="text" name="title" value="$title"></label></p>
                <p><label>Innehåll<br><textarea name="content">$content</textarea></label></p>
                <p><label>Författare<br><input type="text" name="author" value="$author"></label></p>
                <p><label>Publicerat<br><input type="datetime-local" name="pubdate" value="$pubdate"></label></p>
                <p><input type="submit" name="update" value="Uppdatera"></p>
            </fieldset>
        </form>

EOD;

        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Article ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeUpdateTable2($res, "update");
    } elseif ($table == "Object") {
        $db = connectToDatabase($bmoDB);
        $id = isset($_GET['id'])
            ? $_GET['id']
            : null;

        $title = null;
        $catagory = null;
        $text = null;
        $image = null;
        $owner = null;

        if ($id) {
            $sql = "SELECT * FROM Object WHERE id = ?";
            $stmt = $db->prepare($sql);
            $params = [$id];
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_BOTH);

            if (empty($res)) {
                die("id unkown.");
            }
            // Move content of array to individual variables, for ease of use.
            list($id, $title, $catagory, $text, $image, $owner) = $res[0];
        }
        echo <<<EOD
        <h1>Uppdatera en Object</h1>
        <form>
            <fieldset>
                <legend align="center">Välj nedan önskad tabell</legend>
                <input type="hidden" name="page" value="update">
                <input type="hidden" name="nav" value="admin">
                <input type="hidden" name="selected" value="update">
                <input type="submit" name="table" value="Article">
                <input type="submit" name="table" value="Object">
            </fieldset>
        </form>
        <form method="post" action="?page=update-process">
            <fieldset>
                <legend align="center">Object</legend>
                <input type="hidden" name="table" value="Object">
                <p><label>id<br><input type="number" name="id" value="$id" readonly></label></p>
                <p><label>Titel<br><input type="text" name="title" value="$title"></label></p>
                <p><label>Kategori<br><input type="text" name="category" value="$catagory"></label></p>
                <p><label>Text<br><textarea name="text">$text</textarea></label></p>
                <p><label>Bild<br><input type="text" name="image" value="$image"></label></p>
                <p><label>Ägare<br><input type="text" name="owner" value="$owner"></label></p>
                <p><input type="submit" name="update" value="Uppdatera"></p>
            </fieldset>
        </form>
EOD;

        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Object ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeUpdateTable($res, "update");
    }
} else {
    echo <<<EOD
    <h1>Uppdatera en artikel eller objekt</h1>
    <form>
        <fieldset>
            <legend align="center">Välj nedan önskad tabell</legend>
            <input type="hidden" name="page" value="update">
            <input type="hidden" name="nav" value="admin">
            <input type="hidden" name="selected" value="update">
            <input type="submit" name="table" value="Article">
            <input type="submit" name="table" value="Object">
        </fieldset>
    </form>
EOD;
}
