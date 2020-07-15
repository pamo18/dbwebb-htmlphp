
<h1><?=getArticle($bmoDB, 6)[0]["title"];?></h1>
<h4><?=getArticle($bmoDB, 6)[0]["author"] . ', Publicerat: ' . getArticle($bmoDB, 6)[0]["pubdate"]?></h4>
<div class="maggy">
    <figure>
        <img src="img/maggy/begravning_1800.jpg">
        <figcaption>Begravning-1800</figcaption>
    </figure>
    <figure>
        <img src="img/maggy/begravningsbil.jpg">
        <figcaption>Begravningsbil</figcaption>
    </figure>
    <figure>
        <img src="img/maggy/likvagn_med_hast.jpg">
        <figcaption>Likvagn med hast</figcaption>
    </figure>
    <figure>
        <img src="img/maggy/begravningsbyra_skylt.jpg">
        <figcaption>Begravningsbyra skylt</figcaption>
    </figure>
    <figure>
        <a href="?page=gallery&item=19"><img src="img/maggy/minnestavla.jpg"></a>
        <figcaption>Minnestavla</figcaption>
    </figure>
    <figure>
        <a href="?page=gallery&item=30"><img src="img/maggy/parlkrans.jpg"></a>
        <figcaption>Parlkrans</figcaption>
    </figure>
    <figure>
        <a href="?page=gallery&item=12"><img src="img/maggy/gravol.jpg"></a>
        <figcaption>Gravol</figcaption>
    </figure>

    <figure>
        <img src="img/maggy/dodsannonser.jpg">
        <figcaption>Dodsannonser</figcaption>
    </figure>
    <figure>
        <img src="img/maggy/sorgesloja.jpg">
        <figcaption>Sorgesloja</figcaption>
    </figure>

</div>
<div class="begravningsseder">
    <?=getArticle($bmoDB, 6)[0]["content"];?>
</div>
