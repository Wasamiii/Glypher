<?php //Ne pas oublier la search bar ?>

<div id="container-glyph">
    <a href="index.php?action=submit" id="box-submit">
        <svg viewBox="0 0 208 208" fill="none" xmlns="http://www.w3.org/2000/svg" id="vector-submit">
        <path d="M104 0.34375C46.7383 0.34375 0.34375 46.7383 0.34375 104C0.34375 161.262 46.7383 207.656 104 207.656C161.262 207.656 207.656 161.262 207.656 104C207.656 46.7383 161.262 0.34375 104 0.34375ZM164.188 115.703C164.188 118.462 161.93 120.719 159.172 120.719H120.719V159.172C120.719 161.93 118.462 164.188 115.703 164.188H92.2969C89.5383 164.188 87.2812 161.93 87.2812 159.172V120.719H48.8281C46.0695 120.719 43.8125 118.462 43.8125 115.703V92.2969C43.8125 89.5383 46.0695 87.2812 48.8281 87.2812H87.2812V48.8281C87.2812 46.0695 89.5383 43.8125 92.2969 43.8125H115.703C118.462 43.8125 120.719 46.0695 120.719 48.8281V87.2812H159.172C161.93 87.2812 164.188 89.5383 164.188 92.2969V115.703Z" fill="white"/>
        </svg>
    </a>
<?php while($data = $getglyph->fetch()){?>
    <figure>
        <img src="public/IMG/IMG-partenaire-warframe/<?= $data['img'] ?>" id="img-glyph">
        <figcaption><p id="title-of-glyph"><?= $data['title'] ?></p>
        </figcaption>
    </figure>
<?php } ?>
</div>