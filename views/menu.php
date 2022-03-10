<a href="index.php" id="Logo-site">
        <img src="public/IMG/Warframe-logo-site-128.png" alt="logo du site" id="img-logo-site">
        <h1 id="title-site" class="titlenight">Glypher</h1>
</a>

<i class="fas fa-bars"></i>
<a href="index.php" id="homepage">Home</a>
<!--le about.php est provisoire ça deviendra une action j'y mettrais dedans toutes les information comment l'utiliser etc...-->
<a href="about.php" id="about">About</a>
<div class="btn-toggle">
<div class="nightmode"><i class="far fa-sun"></i></div>
<div class="lightmode"><i class="fas fa-moon"></i></div>
<div class="transcand"><img src="public/IMG/PLOT.png"></div>
</div>
<div>
<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
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
                <a href="index.php?action=members" id="singupLink">Signup</a>
        </form>
        </div>
</div>
<?php        
}
?>