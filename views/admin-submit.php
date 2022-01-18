<div id="contain-glyph-admin">
    <ul class="listg-admin">
    <?php while($data = $getglyph->fetch()){?>
        <li class="list-admin">
            <p id="title-of-glyph"><?= $data['title_submit'] ?></p>
            <img src="public/IMG/submit/<?= $data['img_submit'] ?>" id="img-glyph">
            <div class="contain-btn-admin">
                <a class="btn-admin" id="btn-valid-admin">✔</a>
                <a class="btn-admin" id="btn-suppr-admin">❌</a>
            </div>
        </li>
    <?php } ?>
    </ul>
</div>