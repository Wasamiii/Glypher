<a href="index.php" id="Logo-site"><img src="public/IMG/Logo-site128x128.png" alt="logo du site" id="img-logo-site"></a>
<i class="fas fa-bars"></i>
<a href="index.php" id="homepage">Home</a>
<!--le about.php est provisoire ça deviendra une action j'y mettrais dedans toutes les information comment l'utiliser etc...-->
<a href="about.php" id="about">About</a>
<a href="" class="nightmode"><i class="fas fa-moon"></i></a>
<!--<a href="lightmode" class="lightmode"><i class="far fa-sun"></i></a>-->

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
            ?>       
            <a href="index.php?action=disconnect" id="disconnect">Logout</a>
           
<?php        
        if($_SESSION['admin'] == "1"){?>
        <a href="index.php?action=admin" id="administration">admin</a>
<?php
        }

?>
</div>
 <p id="bonjourPseudo"><?php echo 'Hello ' . $_SESSION['pseudo'];?></p>

 <?php
    }else{   
?>
<div id="allForm">
<form action="index.php?action=getlog" method="post" id="connexionForm">
        <input type="name" name="pseudo" placeholder="Pseudo" class="inputSigin" required>
        <input type="password" name="password" placeholder="Password" class="inputSigin" required>
        <input type="submit" value="Login" name="signin" id="connexionSigin">
        <a href="index.php?action=members" id="singupLink">Singup</a>
</form>
</div>
</div>
<?php        
        }
?>