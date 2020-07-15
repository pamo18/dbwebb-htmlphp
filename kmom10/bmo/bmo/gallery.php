
<?=(!empty($_GET["imgFull"]) ? "<h3>" . getObject($bmoDB, 'Object', $_GET['imgFull'], 'title') . "</h3>" : null)?>
<?php
(!empty($_GET["galleryItem"]) ? $galleryItem = $_GET["galleryItem"] : $galleryItem = 1);
(!empty($_GET["pageNum"]) ? $pageNum = $_GET["pageNum"] : $pageNum = 1);
(!empty($_GET["item"]) ? $item = $_GET["item"] : $item = null);
(!empty($_GET["imgFull"]) ? $imgFull = $_GET["imgFull"] : $imgFull = null);
?>

<div class="gallery">
    <?php
    if (!empty($_GET["item"])) {
        echo "<h4 class='currentPage'>Artikel ".$item." av " . dbCount($bmoDB) . "</h4>\n";
        itemDetails($bmoDB, $_GET["item"]);
    } else if (!empty($_GET["imgFull"])) {
        itemImage($bmoDB, $_GET["imgFull"]);
    } else {
        echo "<h4 class='currentPage'>Sida ".$pageNum." av " . galleryPages($bmoDB) . "</h4>\n";
        makeGallery($bmoDB, $galleryItem);
    }
    ?>
</div>

<div class="pageControls">
    <?=makeControls($bmoDB, $item, $imgFull, $galleryItem, $pageNum)?>
</div>
