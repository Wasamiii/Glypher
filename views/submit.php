<?php $title = 'Submit'?>
<?php ob_start(); ?>
  
<!-- Form add glyph with users connected -->

<form id="blockSubmit" action="index.php?action=addpost" method="post" enctype="multipart/form-data">
  <div class="groupForm">
    <p>Nom du partenaire:</p>
    <input type="text" name="titlePost" placeholder="Title" required>
    <p>Image:</p>
    <div class="drag-area">
      <input type="file" name="img_submit"  placeholder="img" class="input-file" id="img-submit" accept="image/png">
      <label for="img-submit" class="label-file">Get the file</label>
    </div>
    <p>Youtube:</p>
    <input type="text" name="submit_Youtube" placeholder="Youtube">
    <p>Twitch:</p>
    <input type="text" name="submit_Twitch" placeholder="Twitch">
    <p>Discord:</p>
    <input type="text" name="submit_Discord" placeholder="Discord">
    <p>Twitter:</p>
    <input type="text" name="submit_Twitter" placeholder="Twitter">
    <p>Instagram:</p>
    <input type="text" name="submit_Instagram" placeholder="Instagram">
    <p>Facebook:</p>
    <input type="text" name="submit_Facebook" placeholder="Facebook">
    <p>Site:</p>
    <input type="text" name="submit_Site_1" placeholder="Site_1">
    <p>Other site:</p>
    <input type="text" name="submit_Site_2" placeholder="Site_2">
    <p>Description:</p>
    <textarea type="text" name="desc_submit" id="tinymce" placeholder="Description" required></textarea>
    <input type="submit" value="Submit" class="btn-submit">
  </div>
</form>
<script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        forced_root_block : false,
        selector: 'textarea#tinymce',
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
    <script src="public/JS/drag-drop.js"></script>
<?php $content = ob_get_clean(); ?>
<?php
require('views/template.php');
?>