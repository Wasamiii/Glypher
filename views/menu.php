<a href="index.php" id="Logo-site"><img src="public/IMG/Logo-site128x128.png" alt="logo du site" id="img-logo-site"></a>
<i class="fas fa-bars"></i>
<a href="index.php" id="homepage">Home</a>
<a href="about.php" id="about">About</a>
<div class="nightmode"><a href="nightmode" class="nightmode"><i class="fas fa-moon"></i></a></div>

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
            ?>       
            <a href="index.php?action=disconnect" id="disconnect">Deconnection</a>
           
<?php        
        if($_SESSION['admin'] == "1"){?>
        <a href="index.php?action=admin" id="administration">administration</a>
<?php
        }

?>
</div>
 <p id="bonjourPseudo"><?php echo 'Bonjour ' . $_SESSION['pseudo'];?></p>

 <?php
    }else{   
?>
<div id="allForm">
<form action="index.php?action=getlog" method="post" id="connexionForm">
        <input type="name" name="pseudo" placeholder="Pseudo" class="inputSigin" required>
        <input type="password" name="password" placeholder="Mot de passe" class="inputSigin" required>
        <input type="submit" value="connexion" name="signin" id="connexionSigin">
        <a href="index.php?action=members" id="singupLink">Inscription</a>
</form>
</div>
</div>
<?php        
        }
?>