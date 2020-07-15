<?php
/**
 * Definitions of commonly used functions.
 */

/*-----------------------------------------------*/
function sessionDestroy()
{
    $_SESSION = [];
    //Delete session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    //Session ends
    session_destroy();
}
/*-----------------------------------------------*/
//check to see if username and passowrd match
function user_check($username, $pass, $dbFile)
{
    $db = connectToDatabase($dbFile);
    $stmt = $db->prepare("SELECT * FROM userlogin WHERE username = ? and pass = ?");
    $params = [$username, $pass];
    $stmt->execute($params);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($res) {
        return true;
    } else {
        return false;
    }
}
/*-----------------------------------------------*/
//if not logged in, redirect to login
function login_check()
{
    if (!isset($_SESSION["username"])) {
        $loginPage = "?page=login";
        // Redirect to success
        return header("Location: $loginPage");
    } else {
        return null;
    }
}
/*-----------------------------------------------*/
//Checks for message type and changes class if found
function messageCheck($check, $type)
{
    if (isset($_SESSION[$check])) {
        if ($type ==  "error") {
            return "errorMessage";
        } elseif ($type == "success") {
            return "successMessage";
        }
    } else {
        return "off";
    }
}
/*-----------------------------------------------*/
function dbCount($dbFile)
{
    $db = connectToDatabase($dbFile);
    $stmt = $db->prepare("SELECT * FROM Object");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbCount = count($res);
    return $dbCount;
}
/*-----------------------------------------------*/
function getObject($dsn, $source, $id, $object)
{
    $db = connectToDatabase($dsn);
    $stmt = $db->prepare("SELECT * FROM $source WHERE id = $id");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res[0][$object];
}
/*-----------------------------------------------*/
function makeControls($dbFile, $item, $imgFull, $galleryItem, $pageNum)
{
    if (empty($item) && empty($imgFull)) {
        return "<a class='nextPage' href='?page=gallery&galleryItem=".nextGalleryPage($dbFile, $galleryItem)."&pageNum=".nextPage($dbFile, $pageNum)."'>Nästa sida</a>\n
                <a class='lastPage' href='?page=gallery&galleryItem=".previousGalleryPage($dbFile, $galleryItem)."&pageNum=".previousPage($dbFile, $pageNum)."'>Förra sidan</a>\n";
    } else if ($imgFull) {
        return "<a class='nextPage' href='?page=gallery&imgFull=".nextarticle($dbFile, $imgFull)."'>Nästa objekt</a>\n
                <a class='lastPage' href='?page=gallery&imgFull=".previousArticle($dbFile, $imgFull)."'>Förra objekt</a>\n
                <a class='tillbaka' href='?page=gallery&item=$imgFull'>Tillbaka</a>";
    } else {
        return "<a class='nextPage' href='?page=gallery&item=".nextarticle($dbFile, $item)."'>Nästa objekt</a>\n
                <a class='lastPage' href='?page=gallery&item=".previousArticle($dbFile, $item)."'>Förra objekt</a>\n
                <a class='tillbaka' href='?page=gallery&".backToGallery($dbFile, $item)."'>Tillbaka</a>";
    }
}
/*-----------------------------------------------*/
function galleryPages($dbFile)
{
    $totalItems = dbCount($dbFile);
    $galleryPages = ceil($totalItems / 6);
    return $galleryPages;
}
/*-----------------------------------------------*/
function backToGallery($dbFile, $item)
{
    $galleryPages = galleryPages($dbFile);
    $galleryItem = 1;
    $pageCount = 1;
    for ($i = 1; $i <= $galleryPages; $i ++) {
        if ($item >= $galleryItem && $item <= $galleryItem+5) {
            return "galleryItem=". $galleryItem ."&pageNum=" .$pageCount;
        }
        $galleryItem += 6;
        $pageCount ++;
    }
}
/*-----------------------------------------------*/
function nextPage($dbFile, $pageNo)
{
    $lastPage = galleryPages($dbFile);
    $firstPage = 1;
    ($pageNo == $lastPage ? $pageNo = $firstPage : $pageNo = $pageNo + 1);
    return $pageNo;
}
/*-----------------------------------------------*/
function previousPage($dbFile, $pageNo)
{
    $lastPage = galleryPages($dbFile);
    $firstPage = 1;
    ($pageNo == $firstPage ? $pageNo = $lastPage : $pageNo = $pageNo - 1);
    return $pageNo;
}
/*-----------------------------------------------*/
function nextGalleryPage($dbFile, $galleryItem)
{
    $lastPage = (galleryPages($dbFile)*6)-5;
    $firstPage = 1;
    ($galleryItem == $lastPage ? $galleryItem = $firstPage : $galleryItem = $galleryItem + 6);
    return $galleryItem;
}
/*-----------------------------------------------*/
function previousGalleryPage($dbFile, $galleryItem)
{
    $lastPage = (galleryPages($dbFile)*6)-5;
    $firstPage = 1;
    ($galleryItem == $firstPage ? $galleryItem = $lastPage : $galleryItem = $galleryItem - 6);
    return $galleryItem;
}
/*-----------------------------------------------*/
function nextarticle($dbFile, $item)
{
    $lastItem = dbCount($dbFile);
    $firstItem = 1;
    ($item == $lastItem ? $item = $firstItem : $item = $item + 1);
    return $item;
}
/*-----------------------------------------------*/
function previousArticle($dbFile, $item)
{
    $lastItem = dbCount($dbFile);
    $firstItem = 1;
    ($item == $firstItem ? $item = $lastItem : $item = $item - 1);
    return $item;
}
/*-----------------------------------------------*/
function itemDetails($dbFile, $item)
{
    echo "<div class='itemDetails'>\n";
    echo "<p class='title'>".getObject($dbFile, 'Object', $item, 'title')."</p>\n";
    echo "<a href='?page=gallery&imgFull=$item'><img class='image' src='img/550x550/".getObject($dbFile, 'Object', $item, 'image')."' alt='Item-{$item}'></a>\n";
    echo "<p class='description'>".getObject($dbFile, 'Object', $item, 'text')."</p>\n";
    echo "</div>\n";
}
/*-----------------------------------------------*/
function itemImage($dbFile, $item)
{
    echo "<div class='imageFull'>\n";
    echo "<img src='img/full-size/".getObject($dbFile, 'Object', $item, 'image')."' alt='Item-{$item}'>\n";
    echo "</div>\n";
}
/*-----------------------------------------------*/
function connectToDatabase($filename)
{
    $dsn = "sqlite:$filename";
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to DSN:<br>$dsn<br>";
        throw $e;
    }
    return $db;
}
/*-----------------------------------------------*/
function searchDB($dbFile, $table, $column, $find, $column2 = null, $exact = null)
{
    if ($find == null) {
        $db = connectToDatabase($dbFile);
        $stmt = $db->prepare("SELECT * FROM $table ORDER BY id");
        $stmt->execute();
    } else {
        if ($find == "Minnestavlor") {
            $find = "Minnestavl";
        } elseif ($find == "Pärlkransar") {
            $find = "Pärlkrans";
        } elseif ($find == "Begravningsfest och Gravöl - ett stort kalas") {
            $find = "Begravningsfest";
        }
        if ($column2) {
            $db = connectToDatabase($dbFile);
            $stmt = $db->prepare("SELECT * FROM $table WHERE $column LIKE ? OR $column2 LIKE ? ORDER BY id");
            $params = ($exact ? [$find, $find] : ["%{$find}%", "%{$find}%"]);
            $stmt->execute($params);
        } else {
            $db = connectToDatabase($dbFile);
            $stmt = $db->prepare("SELECT * FROM $table WHERE $column LIKE ? ORDER BY id");
            $params = ($exact ? [$find] : ["%{$find}%"]);
            $stmt->execute($params);
        }
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
/*-----------------------------------------------*/
function makeGallery($dbFile, $page)
{
    for ($i= $page; $i<$page+6; $i++) {
        if ($i <= dbCount($dbFile)) {
            echo "<div class='object'>\n";
            echo "<a href='?page=gallery&item=". $i ."'> <img class='image' src='img/250x250/".getObject($dbFile, 'Object', $i, 'image')."' alt='Gallery-$i'> </a>\n";
            echo "<p><a class='title' href='?page=gallery&item=". $i ."'>".getObject($dbFile, 'Object', $i, 'title')."</a><p>\n";
            echo "</div>\n";
        }
    }
}
/*-----------------------------------------------*/
function getArticles($dbFile, $table)
{
    $db = connectToDatabase($dbFile);
    $stmt = $db->prepare("SELECT * FROM $table WHERE NOT id = 4 ORDER BY id ASC");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
/*-----------------------------------------------*/
function makeArticles($articles)
{
    foreach ($articles as $article) {
        if ($article["id"] == 6) {
            $link = "?page=begravningsseder";
        } else {
            $link = "?page=articles&articleView={$article['id']}";
        }
        echo
        "<div class='article'>\n
        <a href='{$link}'> <h1>{$article['title']}</h1> </a>\n
         <h4>".$article['author'].". Publicerat: ".$article['pubdate']."</h4>\n
        ".$article['content']."\n
        </div>\n";
    }
}
/*-----------------------------------------------*/
function getArticle($dbFile, $articleView)
{
    $db = connectToDatabase($dbFile);
    $stmt = $db->prepare("SELECT * FROM Article WHERE id LIKE ? ORDER BY id ASC");
    $params = [$articleView];
    $stmt->execute($params);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
/*-----------------------------------------------*/
function makeArticleView($dbFile, $article)
{
    echo <<<EOD
    <div class='article'>
        <h1>{$article[0]['title']}</h1>
        <h4>{$article[0]['author']}. Publicerat: {$article[0]['pubdate']}</h4>
        {$article[0]['content']}
    </div>
EOD;
    showObjectResults(searchDB($dbFile, "Object", "category", $article[0]['title']));
}
/*-----------------------------------------------*/
function makeTable($res)
{
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $rows .= "<tr>";
            $rows .= "<td>{$row['id']}</td>";
            $rows .= "<td class='title'> <a href='?page=gallery&item={$row['id']}'>{$row['title']}</a></td>";
            $rows .= "<td>{$row['category']}</td>";
            $rows .= "<td>{$row['text']}</td>";
            $rows .= "<td> <a href='?page=gallery&item={$row['id']}'><img src=img/80x80/{$row['image']} alt='Item-{$row['id']}'></a> </td>";
            $rows .= "<td>{$row['owner']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>id</th>
            <th>Titel</th>
            <th>Kategori</th>
            <th>Text</th>
            <th>Bild</th>
            <th>Ägare</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Databasen är tom!</p>';
    }
}
/*-----------------------------------------------*/
function makeTable2($res)
{
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $rows .= "<tr>";
            $rows .= "<td>{$row['id']}</td>";
            $rows .= "<td>{$row['category']}</td>";
            $rows .= "<td class='title'> <a href='?page=articles&articleView={$row['id']}'>{$row['title']}</a></td>";
            $rows .= "<td>{$row['content']}</td>";
            $rows .= "<td>{$row['author']}</td>";
            $rows .= "<td>{$row['pubdate']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>id</th>
            <th>Kategori</th>
            <th>Titel</th>
            <th>Innehåll</th>
            <th>Författare</th>
            <th>Publicerat</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Databasen är tom!</p>';
    }
}
/*-----------------------------------------------*/
function makeTableAll($res1, $res2)
{
    makeTable($res1);
    makeTable2($res2);
}
/*-----------------------------------------------*/
function showObjectResults($res)
{
    if ($res) {
        foreach ($res as $row) {
            echo "<div class='searchResults'>\n";
            echo "<p class='title'>{$row["title"]}</p>\n";
            echo "<a href='?page=gallery&imgFull={$row['id']}'> <img class='searchImage' src='img/550x550/{$row["image"]}' alt='{$row["title"]}'> </a>\n";
            echo "<p class='description'>{$row["text"]}</p>\n";
            echo "</div>\n";
        }
    }
}
/*-----------------------------------------------*/
function showArticleResults($res)
{
    if ($res) {
        foreach ($res as $row) {
            echo "<div class='searchResults'>\n
                  <a href='?page=articles&articleView={$row["id"]}'><h2 class='title'>Artikel: {$row["title"]}</h2></a>\n
                  <h4 class='title'>{$row["author"]}</h4>\n
                  <h4 class='title'>Publicerat: {$row["pubdate"]}</h4>\n
                  </div>\n";
        }
    }
}
/*-----------------------------------------------*/
function makeUpdateTable($res, $page, $delete = null)
{
    $icon = ($delete ? "&#10060;" : "&#9998;");
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $id = htmlentities($row['id']);
            $rows .= "<tr>";
            $rows .= "<td><a href='?page=$page&id=$id&table=Object&nav=admin&selected=$page'>$id $icon</a></td>";
            $rows .= "<td class='title'> <a href='?page=gallery&item={$row['id']}'>{$row['title']}</a></td>";
            $rows .= "<td>{$row['category']}</td>";
            $rows .= "<td>{$row['text']}</td>";
            $rows .= "<td> <a href='?page=gallery&item={$row['id']}'><img src=img/80x80/{$row['image']} alt='{$row['title']}'></a> </td>";
            $rows .= "<td>{$row['owner']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>id</th>
            <th>Titel</th>
            <th>Kategori</th>
            <th>Text</th>
            <th>Bild</th>
            <th>Ägare</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Empty Database!</p>';
    }
}
/*-----------------------------------------------*/
function makeUpdateTable2($res, $page, $delete = null)
{
    $icon = ($delete ? "&#10060;" : "&#9998;");
    if ($res) {
        $rows = null;
        foreach ($res as $row) {
            $id = htmlentities($row['id']);
            $rows .= "<tr>";
            $rows .= "<td><a href='?page=$page&id=$id&table=Article&nav=admin&selected=$page'>$id $icon</a></td>";
            $rows .= "<td>{$row['category']}</td>";
            $rows .= "<td class='title'> <a href='?page=articles&articleView={$row['id']}'>{$row['title']}</a></td>";
            $rows .= "<td>{$row['content']}</td>";
            $rows .= "<td>{$row['author']}</td>";
            $rows .= "<td>{$row['pubdate']}</td>";
            $rows .= "</tr>\n";
        }
        echo <<<EOD
        <table>
        <tr>
            <th>id</th>
            <th>Kategori</th>
            <th>Titel</th>
            <th>Innehåll</th>
            <th>Författare</th>
            <th>Publicerat</th>
        </tr>
        $rows
        </table>
EOD;
    } else {
        echo '<p class="table_p">Empty Database!</p>';
    }
}
