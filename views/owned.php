<?php $title = "Owned" ?>
<?php ob_start(); ?>
<div class="search-bar" id="search_bar">
<i class="fas fa-search"></i>
    <input class="search_input" type="text">
</div>

<div id="container-glyph">
<?php 
//! add comment
$titleglyph = "";
$arr_IMG = [];
$arr_Youtube = [];
$arr_Twitch = [];
$arr_Discord = [];
$arr_Twitter = [];
$arr_Instagram = [];
$arr_Facebook = [];
$arr_Site1 = [];
$arr_Site2 = [];
$arr_Description = [];
$arr_IMG = array_filter($arr_IMG);
$arr_Youtube = array_filter($arr_Youtube);
$arr_Twitch = array_filter($arr_Twitch);
$arr_Discord = array_filter($arr_Discord);
$arr_Twitter = array_filter($arr_Twitter);
$arr_Instagram = array_filter($arr_Instagram);
$arr_Facebook = array_filter($arr_Facebook);
$arr_Site1 = array_filter($arr_Site1);
$arr_Site2 = array_filter($arr_Site2);
$arr_Description = array_filter($arr_Description);
while ($data = $getownedglyph->fetch()) {
    if ($titleglyph == $data['title']) {
        $pusharr_IMG = array_push($arr_IMG, $data['img']);
        $pusharr_Youtube = array_push($arr_Youtube,$data['Youtube']);
        $pusharr_Twitch = array_push($arr_Twitch,$data['Twitch']);
        $pusharr_Discord = array_push($arr_Twitter,$data['Twitter']);
        $pusharr_Instagram = array_push($arr_Instagram,$data['Instagram']);
        $pusharr_Facebook = array_push($arr_Facebook,$data['Facebook']);
        $pusharr_Site1 = array_push($arr_Site1,$data['Site_1']);
        $pusharr_Site2 = array_push($arr_Site1,$data['Site_2']);
        $pusharr_Description = array_push($arr_Description,$data['description']);
        //ajouter les infos des images dans l'array
    } else {
            $titleglyph = $data['title'];
            $arr_IMG = [];
            $arr_Youtube = [];
            $arr_Twitch = [];
            $arr_Discord = [];
            $arr_Twitter = [];
            $arr_Instagram = [];
            $arr_Facebook = [];
            $arr_Site1 = [];
            $arr_Site2 = [];
            $arr_Description = [];
            $pusharr_IMG = array_push($arr_IMG, $data['img']);
            $pusharr_Youtube = array_push($arr_Youtube,$data['Youtube']);
            $pusharr_Twitch = array_push($arr_Twitch,$data['Twitch']);
            $pusharr_Discord = array_push($arr_Twitter,$data['Twitter']);
            $pusharr_Instagram = array_push($arr_Instagram,$data['Instagram']);
            $pusharr_Facebook = array_push($arr_Facebook,$data['Facebook']);
            $pusharr_Site1 = array_push($arr_Site1,$data['Site_1']);
            $pusharr_Site2 = array_push($arr_Site1,$data['Site_2']);
            $pusharr_Description = array_push($arr_Description,$data['description']);
            ?>
    <figure class="contain-glyph modal-trigger id_<?= $data['id'] ?>"> 
        <?php if (isset($_SESSION['id'])) { ?>
        <input type="checkbox" name="checkglyph" class="checkglyph" value="<?= $data['id'] ?>">
        <?php } ?>
        <?php if (isset($arr_IMG[0])) { ?>
        <img src="public/IMG/IMG-partenaire-warframe/<?= $arr_IMG[0] ?>" class="img-glyph">
        <?php } ?>
        <figcaption class="figcaption-glyph">
            <p class="title-of-glyph"><?= $titleglyph ?></p>
        </figcaption>
    </figure>
    <div class="modal-container id_<?= $data['id'] ?>">
        <div class="background-modal"></div>
        <div class="modal-div id_<?= $data['id'] ?>">
            <div class="top-modal">
                <p class="title-of-glyph"><?= $titleglyph ?></p>
                <a class="close-modale id_<?= $data['id'] ?>"><i class="fas fa-times"></i></a>
            </div>
            <?php if (isset($arr_IMG[0])) { ?>
            <img src="public/IMG/IMG-partenaire-warframe/<?= $arr_IMG[0] ?>" class="img-glyph-modal">
            <?php } ?>
            <div class="social-network">
                <?php if (empty($arr_Youtube[0])) {?>
                <?php }else{?>
                    <a target="_blank" href="<?= $arr_Youtube[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/Youtube_icon-icons.com_66802.svg" alt="Youtube icon"></a>
                <?php } ?>
                <?php if (empty($arr_Twitch[0])) {?>
                <?php }else{?>
                    <a target="_blank" href="<?= $arr_Twitch[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/twitch_logo_icon_170383.svg" alt="Twitch icon"></a>
                <?php } ?>
                <?php if (empty($arr_Discord[0])) {?>
                <?php }else{?>
                    <a target="_blank" href="<?= $arr_Discord[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/discord_101785.svg" alt="Discord icon"></a>
                <?php } ?>
                <?php if (empty($arr_Twitter[0])) {?>
                <?php }else{ ?>
                    <a target="_blank" href="<?= $arr_Twitter[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/Twitter_icon-icons.com_66803.svg" alt="Twitter icon"></a>
                <?php } ?>
                <?php if (empty($arr_Instagram[0])) {?>
                <?php }else{ ?>
                    <a target="_blank" href="<?= $arr_Instagram[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/4202090instagramlogosocialsocialmedia-115598_115703.svg" alt="Imstagram icon"></a>
                <?php } ?>
                <?php if (empty($arr_Facebook[0])) {?>
                <?php }else{ ?>
                    <a target="_blank" href="<?= $arr_Facebook[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/Facebook_icon-icons.com_66805.svg" alt="Facebook icon"></a>
                <?php } ?>
                <?php if (empty($arr_Site1[0])) {?>
                <?php } else{ ?>
                    <a target="_blank" href="<?= $arr_Site1[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/emblemweb_93503.svg" alt="Site-1 icon"></a>
                <?php } ?>
                <?php if (empty($arr_Site2[0])) {?>
                <?php } else{ ?>
                    <a target="_blank" href="<?= $arr_Site2[0] ?>" class='id_<?= $data['id'] ?>"'><img class="icon-social" src="public/IMG/Social-network/emblemweb_93503.svg" alt="Site-2 icon"></a>
               <?php } ?>
            </div>
            <p class="desc-of-glyph" class='id_<?= $data['id'] ?>"'><?= $arr_Description[0] ?></p>
            <?php
            if (isset($arr_IMG[1])) { ?>
            <img src="public/IMG/IMG-partenaire-warframe/<?= $arr_IMG[1] ?>" class="img-glyph-modal">
            <?php } ?>
            <?php if (isset($arr_IMG[2])) { ?>
            <img src="public/IMG/IMG-partenaire-warframe/<?= $arr_IMG[2] ?>" class="img-glyph-modal">
            <?php } ?>
        </div>
    </div>
        <?php
            $titleglyph = $data['title'];
            $arr_IMG = [];
            $arr_Youtube = [];
            $arr_Twitch = [];
            $arr_Discord = [];
            $arr_Twitter = [];
            $arr_Instagram = [];
            $arr_Facebook = [];
            $arr_Site1 = [];
            $arr_Site2 = [];
            $arr_Description = [];
            $pusharr_IMG = array_push($arr_IMG, $data['img']);
            $pusharr_Youtube = array_push($arr_Youtube,$data['Youtube']);
            $pusharr_Twitch = array_push($arr_Twitch,$data['Twitch']);
            $pusharr_Discord = array_push($arr_Twitter,$data['Twitter']);
            $pusharr_Instagram = array_push($arr_Instagram,$data['Instagram']);
            $pusharr_Facebook = array_push($arr_Facebook,$data['Facebook']);
            $pusharr_Site1 = array_push($arr_Site1,$data['Site_1']);
            $pusharr_Site2 = array_push($arr_Site2,$data['Site_2']);
            $pusharr_Description = array_push($arr_Description,$data['description']);
            
    }
}
 ?>
</div>
<script src="public/JS/search.js"></script>
<script src="public/JS/modales.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require_once('views/template.php');?>