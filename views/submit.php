<?php $title = 'Submit'?>
<?php ob_start(); ?>
<div id="blockSubmit">
    <input type="text" placeholder="Title">
    <input type="text" placeholder="img">
    <input type="text" placeholder="Youtube">
    <input type="text" placeholder="Twitch">
    <input type="text" placeholder="Discord">
    <input type="text" placeholder="Twitter">
    <input type="text" placeholder="Instagram">
    <input type="text" placeholder="Facebook">
    <input type="text" placeholder="Site_1">
    <input type="text" placeholder="Site_2">
    <input type="text" placeholder="Description">
    <button type="submit">Submit</button>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('views/template.php');
?>