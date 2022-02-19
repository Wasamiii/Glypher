<?php $title='Admin' ?>
<?php if ($_SESSION['admin'] === "1"){
?>
<?php ob_start();?>
<div id="contain-glyph-admin">
    <ul class="listg-admin">
    <?php while($data = $getglyph->fetch()){?>
        <li class="list-admin">
            <p id="title-of-glyph"><?= $data['title_submit'] ?></p>
            <img src="public/IMG/submit/<?= $data['img_submit'] ?>" id="img-glyph-submit">

            <div class="contain-btn-admin">
                <a href="index.php?action=getModifySubmit&amp;id_submit=<?=$data['id_submit']?>" class="btn-admin" id="btn-modify-admin"><i class="far fa-edit"></i></a>
                <a href="index.php?action=validation&amp;id_submit=<?=$data['id_submit']?>" class="btn-admin" id="btn-valid-admin"><i class="fas fa-check"></i></a>
                <a href="index.php?action=supprSubmit&amp;id_submit=<?=$data['id_submit']?>" class="btn-admin" id="btn-suppr-admin"><i class="fas fa-times"></i></a>
            </div>
        </li>
    <?php } ?>
    </ul>
</div>
<?php $content = ob_get_clean();?>
<?php require_once("views/Template.php")?>
<?php
}
?>