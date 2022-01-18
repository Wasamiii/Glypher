<?php $title='Admin' ?>
<?php if ($_SESSION['admin'] === "1"){
?>
<?php ob_start();?>
<?php require("views/admin-submit.php") ?>

<?php $content = ob_get_clean();?>
<?php require_once("views/Template.php")?>
<?php
}
?>