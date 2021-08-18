<?php

use Wamp\www\model\Members;
use Wamp\www\model\Fissures;


//Charge les fichers qui appel la base de données
require_once('model/Manager.php');
require_once('model/Members.php');
require_once('model/Fissures.php');
class Controller{
    
    function basicglypher()
    {
        $postManager = new Members();
        $Fissures = new Fissures();
        $getFissures = $Fissures->howToGetFissuresTypeMissions();
    /*TODO:
     * V- récupérer les fissures de l'api en php
     * V- création d'un tableau de résultat
     * V- pour chaques fissure regarder si le node est en BDD (if node1 est en BDD) [utiliser les rowCount]
     * - chaque node est ajouté au tableau 
     * - si présente dans la BDD le node = ''
     * - sinon vaut le node en lui même
     * - ajouter la valeur du modifier voidT 1-2-3-4-5
     * - créé 5 tableaux donc un par hauteur de void et push dans le bon tableau
     * - apeller la vue pour afficher le tableau tiré
     * - elle refera un test si elle est présente sinon affiche le node
     */
        $urlFissures = "http://localhost/views/api.php";
        $ch = curl_init($urlFissures);
        curl_setopt($ch, CURLOPT_URL, $urlFissures);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'Content-Type: application/json');
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
          // Afficher le résultat du serveur
          $addBginningResult = '{';
          $addEndingResult = '}';
          //position de syndicate mission
          $posStingStartSyndicate = strpos($result, '"ActiveMissions"');
          //les fissures sont dans ActiveMissions
          $posStingEndSyndicate = strpos($result,',"VoidTraders"');
          $substrToPos = substr($result,$posStingStartSyndicate,$posStingEndSyndicate-$posStingStartSyndicate );
        //   var_dump($substrToPos);
          $newResult = json_decode(($addBginningResult . $substrToPos . $addEndingResult),true);
        //   var_dump($newResult);
        //   var_dump(substr($substrToPos,2000));
        //   var_dump($newResult['ActiveMissions']);
          //il compte bien ici
            // var_dump(count($newResult['ActiveMissions']));
         
          for($i=0; $i<count($newResult['ActiveMissions']); $i++){
            //il faut touver les différents Node
            $infos = $Fissures->infosFissures($newResult['ActiveMissions'][$i]['Node'])->fetch();
            var_dump($infos);
            }



        //   $nodeResult = ['Node'];
        //   var_dump($nodeResult);
          //BDD
          $data = $getFissures ->fetch();
        //   var_dump($data) ;
          $nodeData = $data['node'];
          //! Surement à modifier car rowCount à une erreur
        //   $rowCont = $nodeData ->rowCount();
          if($nodeData == $newResult){
              var_dump('je suis dans le if');
          }
        }
        curl_close ($ch);
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
