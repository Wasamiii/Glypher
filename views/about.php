<?php $title = "About" ?>
<?php ob_start(); ?>

<div class="container-about">
    <h2 class="h2-about">About this site</h2>
    <p class="p-about">This website helps you to find information on glyphs, how to acquire them, and social links on their respective Warframe Partners / Fansites. This website does not offer any glyphs and does not condone any selling, trading, or any form of transction involving the content on this website.</p>
    <h4 class="h4-about">Disclaimer</h4>
    <p class="p-about">Digital Extremes Ltd, Warframe and the Warframe logo are registered trademarks.
        All rights are reserved worldwide. This site has no official link with Digital Extremes Ltd or Warframe or any of its partners.
        All artwork, screenshots, characters or other recognizable features of the intellectual property relating to these trademarks are likewise the intellectual property of Digital Extremes Ltd.
        Furthermore, all works referenced herein are the property of their respective creators. This site is maintained for the express purpose of indexing community content.</p>
    </div>
    
<?php $content = ob_get_clean(); ?>
<?php require_once('views/template.php');?>