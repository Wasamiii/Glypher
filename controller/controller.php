<?php

use Wamp\www\model\Members;


//Charge les fichers qui appel la base de données
require_once('model/Manager.php');
require_once('model/Members.php');
class Controller{
    
    function basicglypher()
    {
        $postManager = new Members();
        // die(var_dump('dans le controller'));
        require('views/basicsglypher.php');
    }

    public function signup()
    {
        $sign = new Members();
        require('views/signupView.php');
    }

    public function postsignup()
    {
    $register = new Members();
        if(isset($_POST['inscription'])){
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        extract($_POST);

            if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){
            //2 champ mdp différent retourne faux aussi 
                if($password == $cpassword){
                    $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                    $signup = $register->postsignup($pseudo,$email,$pass_hache);
                }else{
                echo "Les mots de passe sont différents !";
                }
            }
        }
        //à modifier en fonction des différentes condition 2 pseudo identiques on retourne faux 
        if($signup = false){
        throw new Exception('Impossibilité de s\'inscrire pour l\'instant');
        
        }else{
        header('Location: index.php');
        }
    }

    public function verifPseudo($pseudo)
    {
        $verifpseudo = new Members();
        if(isset($_POST['inscription'])){
            $pseudo = $_POST['pseudo'];
            $pseudos = $verifpseudo -> getsignup($pseudo);

            if($pseudos == 0){
                echo "Pseudo disponible";
            }else{
                throw new Exception('Pseudo non disponible');
            }
        }
    }

    public function verifyLogin()
    {
        $verifylogin = new Members();
        if(isset($_POST['signin'])){
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $resultat = $verifylogin -> getlogin();
        // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
            
            if (!$resultat)
            {
                echo 'Mauvais identifiant !';
            }
            else
            {
                if ($isPasswordCorrect) {
                    $_SESSION['id'] = $resultat['user_id'];
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['admin']= $resultat['admin'];
                    header('Location: index.php');
            }else {
                    echo 'Mauvais mot de passe !';
                }
            }
        }
    }
    
    function disconnect(){
        session_destroy();
        header('Location: index.php');
    }
}
