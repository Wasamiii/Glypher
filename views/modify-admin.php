<?php $title = 'Modify'?>
<?php ob_start(); 
//verify admin session
?>
<?php if($_SESSION["admin"] == "1"){?>
<form id="blockModify" action="index.php?action=modifySubmit&amp;id_submit=<?=$_GET['id_submit']?>" method="post">

    <p>Youtube:</p>
    <input type="text" name="modify_Youtube" placeholder="Youtube">
    <p>Twitch:</p>
    <input type="text" name="modify_Twitch" placeholder="Twitch">
    <p>Discord:</p>
    <input type="text" name="modify_Discord" placeholder="Discord">
    <p>Twitter:</p>
    <input type="text" name="modify_Twitter" placeholder="Twitter">
    <p>Instagram:</p>
    <input type="text" name="modify_Instagram" placeholder="Instagram">
    <p>Facebook:</p>
    <input type="text" name="modify_Facebook" placeholder="Facebook">
    <p>Site:</p>
    <input type="text" name="modify_Site_1" placeholder="Site_1">
    <p>Other site:</p>
    <input type="text" name="modify_Site_2" placeholder="Site_2">
    <p>Description:</p>
    <textarea type="text" name="desc_modify" id="tinymceMOD" placeholder="Description" required></textarea>
    <input type="submit" value="Modify" class="btn-modify">


</form>
<?php } ?>
<script src="public/JS/form.js"></script>
<script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        forced_root_block : false,
        selector: 'textarea#tinymceMOD',
        menubar: false,
        plugins: [
            '',
            'searchreplace visualblocks fullscreen',
            'table paste help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
    </script>

<?php $content = ob_get_clean(); ?>
<?php
require('views/Template.php');
?>