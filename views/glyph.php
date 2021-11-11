<?php //Ne pas oublier la search bar ?>

<div id="container-glyph">
    
    <?php //for($i = 0; $i<count($getglyph['title']);$i++){
?>
        <?php while($data = $getglyph->fetch()){?>
            <figure>
            <img src="public/IMG/IMG-partenaire-warframe/<?= $data['img'] ?>" id="img-glyph">
        <figcaption><p id="title-of-glyph"><?= $data['title'] ?></p>
    </figcaption>
</figure>
    <?php } ?>
</div>