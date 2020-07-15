<?php login_check() ?>

<?php
$table = (isset($_GET["table"]) ? $_GET["table"] : null);
if ($table) {
    if ($table == "Article") {
        $db = connectToDatabase($bmoDB);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $db->prepare("SELECT * FROM Article WHERE id = ?");
            $params = [$id];
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $deleteTitle = $res[0]["title"];
            $_SESSION["deleteTitle"] = $deleteTitle;
        } else {
            $id = null;
        }
        if ($id) {
            echo <<<EOD
            <h1>Ta bort en article</h1>
            <form>
                <fieldset>
                    <legend align="center">Välj nedan önskad tabell</legend>
                    <input type="hidden" name="page" value="delete">
                    <input type="hidden" name="nav" value="admin">
                    <input type="hidden" name="selected" value="delete">
                    <input type="submit" name="table" value="Article">
                    <input type="submit" name="table" value="Object">
                </fieldset>
            </form>
            <form method="post" action="?page=delete-process">
                <fieldset>
                    <input type="hidden" name="table" value='{$_GET['table']}'>
                    <legend align="center">Ta bort {$_GET['table']}</legend>
                    <p><label>$deleteTitle<br><input type="hidden" name="id" value="$id" readonly></label></p>
                    <p><input type="submit" name="delete" value="Ta bort"></p>
                </fieldset>
            </form>

EOD;
        } else {
            echo <<<EOD
            <h1>Ta bort en artikel</h1>
            <form>
                <fieldset>
                    <legend align="center">Välj nedan önskad tabell</legend>
                    <input type="hidden" name="page" value="delete">
                    <input type="hidden" name="nav" value="admin">
                    <input type="hidden" name="selected" value="delete">
                    <input type="submit" name="table" value="Article">
                    <input type="submit" name="table" value="Object">
                </fieldset>
            </form>
EOD;
        }
        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Article ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeUpdateTable2($res, "delete", $delete = true);
    } elseif ($table == "Object") {
        $db = connectToDatabase($bmoDB);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $db->prepare("SELECT * FROM Object WHERE id = ?");
            $params = [$id];
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $deleteTitle = $res[0]["title"];
            $_SESSION["deleteTitle"] = $deleteTitle;
        } else {
            $id = null;
        }
        if ($id) {
            echo <<<EOD
            <h1>Ta bort en objekt</h1>
            <form>
                <fieldset>
                    <legend align="center">Välj nedan önskad tabell</legend>
                    <input type="hidden" name="page" value="delete">
                    <input type="hidden" name="nav" value="admin">
                    <input type="hidden" name="selected" value="delete">
                    <input type="submit" name="table" value="Article">
                    <input type="submit" name="table" value="Object">
                </fieldset>
            </form>
            <form method="post" action="?page=delete-process">
                <fieldset>
                    <input type="hidden" name="table" value='{$_GET['table']}'>
                    <legend align="center">Ta bort {$_GET['table']}</legend>
                    <p><label>$deleteTitle<br><input type="hidden" name="id" value="$id" readonly></label></p>
                    <p><input type="submit" name="delete" value="Ta bort"></p>
                </fieldset>
            </form>
EOD;

        } else {
            echo <<<EOD
            <h1>Ta bort en objekt</h1>
            <form>
                <fieldset>
                    <legend align="center">Välj nedan önskad tabell</legend>
                    <input type="hidden" name="page" value="delete">
                    <input type="hidden" name="nav" value="admin">
                    <input type="hidden" name="selected" value="delete">
                    <input type="submit" name="table" value="Article">
                    <input type="submit" name="table" value="Object">
                </fieldset>
            </form>
EOD;
        }
        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Object ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeUpdateTable($res, "delete", $delete = true);
    }
} else {
    echo <<<EOD
    <h1>Ta bort en artikel eller objekt</h1>
    <form>
        <fieldset>
            <legend align="center">Välj nedan önskad tabell</legend>
            <input type="hidden" name="page" value="delete">
            <input type="hidden" name="nav" value="admin">
            <input type="hidden" name="selected" value="delete">
            <input type="submit" name="table" value="Article">
            <input type="submit" name="table" value="Object">
        </fieldset>
    </form>
EOD;
}
