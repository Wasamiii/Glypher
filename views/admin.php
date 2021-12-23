<?php $title='Admin'; ?>
<?php ob_start();?>

<?php $content = ob_get_contents();?>
<?php require("views/Template.php")?>
<?php require("views/admin-submit.php") ?>