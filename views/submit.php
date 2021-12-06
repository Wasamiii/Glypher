<?php $title = 'Submit'?>
<?php ob_start(); ?>
  <script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>


<form id="blockSubmit" action="index.php?action=addpost" method="post">
  <div class="groupForm">
    <p>Nom du partenaire:</p>
    <input type="text" name="titlePost" placeholder="Title" required>
    <div class="drag-area">
      <p>Image:</p>
      <input type="file" name="img_submit"  placeholder="img" class="drag-area" required>
    </div>
    <p>Youtube:</p>
    <input type="text" name="submit_Youtube" placeholder="Youtube">
    <p>Twitch:</p>
    <input type="text" name="submit_Twitch" placeholder="Twitch">
    <p>Discord:</p>
    <input type="text" name="submit_Discord" placeholder="Discord">
    <p>Twitter:</p>
    <input type="text" name="submit_Tiwtter" placeholder="Twitter">
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
<script>
    tinymce.init({
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
    <script>
      let input = document.querySelector("input.btn-submit");
      input.addEventListener("click",()=>{
          console.log('ça clique');
          let form = document.querySelector("form");
          form.submit();
      });
    </script>
    <script src="public/JS/drag-drop.js"></script>
<?php $content = ob_get_clean(); ?>
<?php
require('views/template.php');
?>