<div id="contain-glyph-admin">
<?php if ($_SESSION['admin'] === "1"){
?>
    <?php while($data = $getglyph->fetch()){?>
    <figure id="figure-admin">
        <img src="public/IMG/submit/<?= $data['img_submit'] ?>" id="img-glyph">
        <figcaption>
            <p id="title-of-glyph"><?= $data['title_submit'] ?></p>
        </figcaption>
    </figure>
    <?php } ?>
<?php
}
?>
</div>