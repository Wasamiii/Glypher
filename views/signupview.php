<?php $title = 'signup'; ?>
<?php ob_start(); ?>
<form action="index.php?action=validSignup" method="post"   id="Signupview">
    <div id="contentSignup">
        <p id="textSinup">Singup</p>
        <label for="pseudo" class="signupLabel">Pseudo: </label>
        <input type="name" name="pseudo"  class="inputSignup"  required></br>
        <label for="email" class="signupLabel">Email: </label>
        <input type="email" name="email" class="inputSignup" required></br>
        <label for="password" class="signupLabel">Password: </label>
        <input type="password" name="password" class="inputSignup" required></br>
        <label for="cpassword" class="signupLabel">Confirm password: </label>
        <input type="password" name="cpassword" class="inputSignup" required></br>        
        <input type="submit" name="inscription" value="s'inscrire" id="signupButton">
        </div>
</form>
<?php $content = ob_get_clean(); ?>


<?php require_once('views/Template.php'); ?>