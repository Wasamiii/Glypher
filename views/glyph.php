<?php //Ne pas oublier la search bar ?>
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
<?php while($data = $getglyph->fetch()){?>
    <figure class="contain-glyph modal-trigger id_<?= $data['id'] ?>">
        <?php if(isset($_SESSION['id'])){ ?>
            <input type="checkbox" name="checkglyph" id="checkglyph">
            <?php } ?>
        <img src="public/IMG/IMG-partenaire-warframe/<?= $data['img'] ?>" class="img-glyph">
        <figcaption class="figcaption-glyph">
            <p class="title-of-glyph"><?= $data['title'] ?></p>
        </figcaption>
    </figure>
    
    <div class="modal-container id_<?= $data['id'] ?>">
        <div class="background-modal"></div>
        <div class="modal-div">
            <div class="top-modal">
                <p class="title-of-glyph"><?= $data['title'] ?></p>
                <a class="close-modale id_<?= $data['id'] ?>"><i class="fas fa-times"></i></a>
            </div>
            <img src="public/IMG/IMG-partenaire-warframe/<?= $data['img'] ?>" class="img-glyph-modal">
            <div class="social-network">
                <?php if($data['Youtube'] !== ""){?>
                    <a target="_blank" href="<?= $data['Youtube']?>"><img class="icon-social" src="public/IMG/Social-network/Youtube_icon-icons.com_66802.svg" alt="Youtube icon"></a>
                <?php } ?>
                <?php if($data['Twitch'] !== ""){?>
                    <a target="_blank" href="<?= $data['Twitch'] ?>"><img class="icon-social" src="public/IMG/Social-network/twitch_logo_icon_170383.svg" alt="Twitch icon"></a>
                <?php } ?>
                <?php if($data['Discord'] !== ""){?>
                    <a target="_blank" href="<?= $data['Discord'] ?>"><img class="icon-social" src="public/IMG/Social-network/discord_101785.svg" alt="Discord icon"></a>
                <?php } ?>
                <?php if($data['Twitter'] !== ""){?>
                    <a target="_blank" href="<?= $data['Twitter'] ?>"><img class="icon-social" src="public/IMG/Social-network/Twitter_icon-icons.com_66803.svg" alt="Twitter icon"></a>
                <?php } ?>
                <?php if($data['Instagram'] !== ""){?>
                    <a target="_blank" href="<?= $data['Instagram'] ?>"><img class="icon-social" src="public/IMG/Social-network/4202090instagramlogosocialsocialmedia-115598_115703.svg" alt="Imstagram icon"></a>
                <?php } ?>
                <?php if($data['Facebook'] !== ""){?>
                    <a target="_blank" href="<?= $data['Facebook'] ?>"><img class="icon-social" src="public/IMG/Social-network/Facebook_icon-icons.com_66805.svg" alt="Facebook icon"></a>
                <?php } ?>
                <?php if($data['Site_1'] !== ""){?>
                    <a target="_blank" href="<?= $data['Site_1'] ?>"><img class="icon-social" src="public/IMG/Social-network/emblemweb_93503.svg" alt="Site-1 icon"></a>
                <?php } ?>
                <?php if($data['Site_2'] !== ""){?>
                    <a target="_blank" href="<?= $data['Site_2'] ?>"><img class="icon-social" src="public/IMG/Social-network/emblemweb_93503.svg" alt="Site-2 icon"></a>
                <?php } ?>
            </div>
            <p class="desc-of-glyph"><?= $data['description'] ?></p>
        </div>
    </div>
<?php } ?>
</div>