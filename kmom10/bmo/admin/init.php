<?php login_check() ?>

<?php
$table = (isset($_GET["table"]) ? $_GET["table"] : null);
if ($table) {
    if ($table == "Article") {
        echo <<<EOD
        <h1>Rensa Article Databasen</h1>
        <form>
        <fieldset>
            <legend align="center">Välj nedan önskad tabell</legend>
            <input type="hidden" name="page" value="init">
            <input type="hidden" name="nav" value="admin">
            <input type="hidden" name="selected" value="init">
            <input type="submit" name="table" value="Article">
            <input type="submit" name="table" value="Object">
        </fieldset>
        </form>
        <form method="post" action="?page=init-process">
            <fieldset>
                <p><label>All innehål på databasen nedan kommer att raderas</label></p>
                <input type="hidden" name="table" value="Article">
                <input type="submit" name="init" value="Initialisera">
            </fieldset>
EOD;

        $db = connectToDatabase($bmoDB);
        $sql = "SELECT * FROM Article ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        makeTable2($res);
    } elseif ($table == "Object") {
        echo <<<EOD
        <h1>Rensa Object Databasen</h1>
        <form>
            <fieldset>
                <legend align="center">Välj nedan önskad tabell</legend>
                <input type="hidden" name="page" value="init">
                <input type="hidden" name="nav" value="admin">
                <input type="hidden" name="selected" value="init">
                <input type="submit" name="table" value="Article">
                <input type="submit" name="table" value="Object">
            </fieldset>
        </form>
        <form method="post" action="?page=init-process">
            <fieldset>
                <p><label>All innehål på databasen nedan kommer att raderas</label></p>
                <input type="hidden" name="table" value="Object">
                <input type="submit" name="init" value="Initialisera">
            </fieldset>
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
    <h1>Rensa Databasen</h1>
    <form>
        <fieldset>
            <legend align="center">Välj nedan önskad tabell</legend>
            <input type="hidden" name="page" value="init">
            <input type="hidden" name="nav" value="admin">
            <input type="hidden" name="selected" value="init">
            <input type="submit" name="table" value="Article">
            <input type="submit" name="table" value="Object">
        </fieldset>
    </form>
EOD;
}
