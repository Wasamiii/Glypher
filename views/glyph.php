<div class="search-bar" id="search_bar">
<i class="fas fa-search"></i>
    <input class="search_input" type="text">
</div>

<div id="container-glyph">
    <a href="index.php?action=submit" id="box-submit">
        <svg viewBox="0 0 208 208" fill="none" xmlns="http://www.w3.org/2000/svg" id="vector-submit">
        <path d="M104 0.34375C46.7383 0.34375 0.34375 46.7383 0.34375 104C0.34375 161.262 46.7383 207.656 104 207.656C161.262 207.656 207.656 161.262 207.656 104C207.656 46.7383 161.262 0.34375 104 0.34375ZM164.188 115.703C164.188 118.462 161.93 120.719 159.172 120.719H120.719V159.172C120.719 161.93 118.462 164.188 115.703 164.188H92.2969C89.5383 164.188 87.2812 161.93 87.2812 159.172V120.719H48.8281C46.0695 120.719 43.8125 118.462 43.8125 115.703V92.2969C43.8125 89.5383 46.0695 87.2812 48.8281 87.2812H87.2812V48.8281C87.2812 46.0695 89.5383 43.8125 92.2969 43.8125H115.703C118.462 43.8125 120.719 46.0695 120.719 48.8281V87.2812H159.172C161.93 87.2812 164.188 89.5383 164.188 92.2969V115.703Z" fill="white"/>
        </svg>
    </a>
<?php 
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
while ($data = $getglyph->fetch()) {
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
        if (count($arr_IMG)== null || empty($arr_IMG)) {
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
        }else {
            ?>
    <figure class="contain-glyph modal-trigger id_<?= $data['id'] ?>"> 
        <?php if (isset($_SESSION['id'])) { ?>
        <input type="checkbox" name="checkglyph" class="checkglyph">
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
}
 ?>
</div>