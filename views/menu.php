<nav class="navbar">
        <a href="index.php" id="Logo-site">
                <img src="public/IMG/Warframe-logo-site-128.png" alt="logo du site" id="img-logo-site">
                <h1 id="title-site" class="titlenight">Glypher</h1>
        </a>
        <ul class="menu-withoutLogo">
                <li>
                        <a href="index.php" id="homepage">Home</a>
                </li>
                <li>
                        <a href="index.php?action=about" id="about">About</a>
                </li>
                <li>
                        <div class="btn-toggle">
                                <div class="nightmode"><i class="far fa-sun"></i></div>
                                <div class="lightmode"><i class="fas fa-moon"></i></div>
                                <div class="transcand"><img src="public/IMG/PLOT.png" alt="transcand mode"></div>
                        </div>
                </li>
                <li>
                        <?php
                        //check session id and pseudo
                        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
                        ?>    
                        <ul>
                                <li>
                                        <p id="helloPseudo"><?php echo $_SESSION['pseudo'];?>  <i class="fas fa-angle-down not-rotate"></i></p>
                                        
                                </li>
                                <li>
                                        <div id="dropdown_content" class="dropdown_content">
                                        <a href="index.php?action=owned" >Owned Glyph</a>
                                        <a href="index.php?action=notowned" >Not Owned Glyph</a>

                                        <a href="index.php?action=disconnect" id="disconnect">Logout</a>
                                        <?php
                                        //check if admin connected    
                                        if($_SESSION['admin'] == "1"){?>
                                        <a href="index.php?action=admin" id="administration">admin</a>
                                        <?php } ?>
                                        </div>
                                </li>
                        </ul>
                </li>
                <?php
                }else{
                    ?>
                <li>
                        <div id="allForm">
                                <form action="index.php?action=getlog" method="post" id="connexionForm">
                                        <input type="name" name="pseudo" placeholder="Pseudo" class="inputSigin" required>
                                        <input type="password" name="password" placeholder="Password" class="inputSigin" required>
                                        <input type="submit" value="Login" name="signin" id="connexionSigin">
                                        <a href="index.php?action=members" id="singupLink">Signup</a>
                                </form>
                        </div>
                </li>
                <?php } ?>
        </ul>
</nav>
