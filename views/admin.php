<?php $title='Admin' ?>
<?php 
//check admin session and glyph submit by users
if ($_SESSION['admin'] === "1"){
?>
<?php ob_start();?>

<div id="contain-glyph-admin">
    <?php while($data = $getglyph->fetch()){?>
        <figure class="contain-glyph modal-trigger id_<?= $data['id_submit'] ?>">
        <img src="public/IMG/submit/<?= $data['img_submit'] ?>" class="img-glyph">
        <figcaption class="figcaption-glyph">
            <p class="title-of-glyph"><?= $data['title_submit'] ?></p>
        </figcaption>
    </figure>
        <div class="modal-container id_<?= $data['id_submit'] ?>">
        <div class="background-modal"></div>
        <div class="modal-div">
            <div class="top-modal">
                <p class="title-of-glyph"><?= $data['title_submit'] ?></p>
                <a class="close-modale id_<?= $data['id_submit'] ?>"><i class="fas fa-times"></i></a>
            </div>
            <img src="public/IMG/submit/<?= $data['img_submit'] ?>" class="img-glyph-modal">
            <div class="social-network">
                <?php if(!empty($data['submit_Youtube'])){?>
                    <a target="_blank" href="<?= $data['submit_Youtube'] ?>"><img class="icon-social" src="public/IMG/Social-network/Youtube_icon-icons.com_66802.svg" alt="Youtube icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Twitch'])){?>
                <a target="_blank" href="<?= $data['submit_Twitch'] ?>"><img class="icon-social" src="public/IMG/Social-network/twitch_logo_icon_170383.svg" alt="Twitch icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Discord'])){?>
                <a target="_blank" href="<?= $data['submit_Discord'] ?>"><img class="icon-social" src="public/IMG/Social-network/discord_101785.svg" alt="Discord icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Twitter'])){?>
                <a target="_blank" href="<?= $data['submit_Twitter'] ?>"><img class="icon-social" src="public/IMG/Social-network/Twitter_icon-icons.com_66803.svg" alt="Twitter icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Instagram'])){?>
                <a target="_blank" href="<?= $data['submit_Instagram'] ?>"><img class="icon-social" src="public/IMG/Social-network/4202090instagramlogosocialsocialmedia-115598_115703.svg" alt="Imstagram icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Facebook'])){?>
                <a target="_blank" href="<?= $data['submit_Facebook'] ?>"><img class="icon-social" src="public/IMG/Social-network/Facebook_icon-icons.com_66805.svg" alt="Facebook icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Site_1'])){?>
                <a target="_blank" href="<?= $data['submit_Site_1'] ?>"><img class="icon-social" src="public/IMG/Social-network/emblemweb_93503.svg" alt="Site-1 icon"></a>
                <?php } ?>
                <?php if(!empty($data['submit_Site_2'])){?>
                <a target="_blank" href="<?= $data['submit_Site_2'] ?>"><img class="icon-social" src="public/IMG/Social-network/emblemweb_93503.svg" alt="Site-2 icon"></a>
                <?php } ?>
            </div>
            <p class="desc-of-glyph"><?php echo($data['desc_submit']); ?></p>
            <div class="contain-btn-admin">
                <a href="index.php?action=getModifySubmit&amp;id_submit=<?=$data['id_submit']?>" class="btn-admin" id="btn-modify-admin"><i class="far fa-edit"></i></a>
                <a href="index.php?action=validation&amp;id_submit=<?=$data['id_submit']?>" class="btn-admin" id="btn-valid-admin"><i class="fas fa-check"></i></a>
                <a href="index.php?action=supprSubmit&amp;id_submit=<?=$data['id_submit']?>" class="btn-admin" id="btn-suppr-admin"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php $content = ob_get_clean();?>
<?php require_once("views/Template.php")?>
<?php
}
?>