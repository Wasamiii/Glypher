<?php $title = 'Glyphers'?>
<?php ob_start(); ?>

<!--Ici se trouvera la totalité des glyphes mais non cochables car utilisateurs non inscrit -->

<?php $content = ob_get_clean(); ?>
<?php require_once('views/template.php'); ?>