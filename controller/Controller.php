<?php
namespace controller;
//require "vendor/autoload.php";

//Charge les fichers qui appel la base de données
require_once('model/Manager.php');
require_once('model/Members.php');
require_once('model/Fissures.php');
require_once('model/Glyph.php');

use model\Manager;
use model\Fissures;
use model\Members;
use model\Glyph;

class Controller{
    public function __construct(){

    }
    // function testGlyph(){
    //     $glypher = new Glyph();
    //     $getglyph = $glypher->GetGlyph();
    //     return $getglyph;

    // }
    function basicglypher()
    {
        
        $postManager = new Members();
        $Fissures = new Fissures();
        
        $getFissures = $Fissures->howToGetFissuresTypeMissions();

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
            $addBiginningResult = '{';
            $addEndingResult = '}';
            //position de ActiveMissions
            $posStingStartActive = strpos($result, '"ActiveMissions"');
            
            //les fissures sont dans ActiveMissions
            $posStingEndActive = strpos($result, ',"VoidTraders"');
            $substrToPos = substr($result, $posStingStartActive, $posStingEndActive-$posStingStartActive);
            $newResult = json_decode(($addBiginningResult . $substrToPos . $addEndingResult), true);
            // var_dump($newResult);
            //Tableau de rangement des fissures en fonction de leurs hauteur VoidT?
            $arrayT1 = [];
            $arrayT2 = [];
            $arrayT3 = [];
            $arrayT4 = [];
            $arrayT5 = [];
            $notInDB = [];

            for ($i=0; $i<count($newResult['ActiveMissions']); $i++) {
            
                //il faut touver les différents Node
                $infos = $Fissures->infosFissures($newResult['ActiveMissions'][$i]['Node'])->fetch();
                 $timeFissures = $newResult['ActiveMissions'][$i]["Expiry"]["\$date"]["\$numberLong"];
                // $countr_Fissurres = floor(($timeFissures/10000) - (time()/1000));
                //Récupérer les Nodes aussi dans la BDD pour les comparer
                $node = $Fissures->infosFissures($infos['node']);
                
               
                if ($node->rowCount()!= null) {
                    $void = substr($newResult['ActiveMissions'][$i]['Modifier'], 5, 1);
                    switch ($void) {
                    case '1': array_push($arrayT1, array_merge($node->fetch(),array("Expiry"=> $timeFissures)));
                    break;
                    case '2': array_push($arrayT2, array_merge($node->fetch(),array("Expiry"=> $timeFissures)));
                    break;
                    case '3': array_push($arrayT3, array_merge($node->fetch(),array("Expiry"=> $timeFissures)));
                    break;
                    case '4': array_push($arrayT4, array_merge($node->fetch(),array("Expiry"=> $timeFissures)));
                    break;
                    case '5': array_push($arrayT5, array_merge($node->fetch(),array("Expiry"=> $timeFissures)));
                    break;
                }
                } else {
                    array_push($notInDB,array("node"=> $newResult['ActiveMissions'][$i]['Node'],"Expiry"=> $timeFissures));
                }
            }

        }
        curl_close ($ch);


        $glypher = new Glyph();
        $getglyph = $glypher->GetGlyph();
        require('views/basicsglypher.php');
    }
    public function submit(){
        require('views/submit.php');
    }
    public function addpost($titlePost,$img_submit,$submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Tiwtter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$author){
        $newGlyph = new Glyph();
        $addGlyph = $newGlyph -> addGlyph(
            $titlePost,
            $img_submit,
            $submit_Youtube,
            $submit_Twitch,
            $submit_Discord,
            $submit_Tiwtter,
            $submit_Instagram,
            $submit_Facebook,
            $submit_Site_1,
            $submit_Site_2,
            $desc_submit,
            $author
        );
        if($addGlyph === false){
            die(var_dump("Its not possible to add glyph"));
        }else{
            header('Location: index.php');
        }
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
        if($signup !== false){
        echo('Impossibilité de s\'inscrire pour l\'instant');
        
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
                echo('Pseudo non disponible');
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
