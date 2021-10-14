<?php $title = 'Glyphers'?>
<?php ob_start(); ?>
    <?php require_once('views/timers.php');?>
    <?php require_once('views/glyph.php'); ?>
<!--Ici se trouvera la totalité des glyphes mais non cochables car utilisateurs non inscrit -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="public/JS/CallApi.js"></script>
<script src="public/JS/timerCetus.js"></script>
<script src="public/JS/fissures.js"></script>
<script src="public/JS/barokiteer.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require_once('views/template.php');?>