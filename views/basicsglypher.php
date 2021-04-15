<?php $title = 'Glyphers'?>
<?php ob_start(); ?>
<script src="JS/main.js" type="text/javascript"></script>
<!--Ici se trouvera la totalité des glyphes mais non cochables car utilisateurs non inscrit -->

<?php $content = ob_get_clean(); ?>
<?php require_once('views/template.php'); ?>