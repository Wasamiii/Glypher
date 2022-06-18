<?php
namespace controller;
//require "vendor/autoload.php";

//Load the files that call the database
require_once('model/Manager.php');
require_once('model/Members.php');
require_once('model/Fissures.php');
require_once('model/Glyph.php');

use model\Manager;
use model\Fissures;
use model\Members;
use model\Glyph;

class Controller
{
    public function __construct()
    {
    }
    //view global + timers
    public function basicglypher()
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
            // View result server
            $addBiginningResult = '{';
            $addEndingResult = '}';
            //search position of ActiveMissions
            $posStingStartActive = strpos($result, '"ActiveMissions"');
            
            //the fissures is in ActiveMissions
            $posStingEndActive = strpos($result, ',"VoidTraders"');
            $substrToPos = substr($result, $posStingStartActive, $posStingEndActive-$posStingStartActive);
            $newResult = json_decode(($addBiginningResult . $substrToPos . $addEndingResult), true);
            //Array for different tier fissures
            $arrayT1 = [];
            $arrayT2 = [];
            $arrayT3 = [];
            $arrayT4 = [];
            $arrayT5 = [];
            $notInDB = [];

            for ($i=0; $i<count($newResult['ActiveMissions']); $i++) {
            
                //search the differents Node
                $infos = $Fissures->infosFissures($newResult['ActiveMissions'][$i]['Node'])->fetch();
                $timeFissures = $newResult['ActiveMissions'][$i]["Expiry"]["\$date"]["\$numberLong"];
                //Get the Nodes also in the DB to compare them
                $node = $Fissures->infosFissures($infos['node']);
                
               
                if ($node->rowCount()!= null) {
                    $void = substr($newResult['ActiveMissions'][$i]['Modifier'], 5, 1);
                    switch ($void) {
                    case '1': array_push($arrayT1, array_merge($node->fetch(), array("Expiry"=> $timeFissures)));
                    break;
                    case '2': array_push($arrayT2, array_merge($node->fetch(), array("Expiry"=> $timeFissures)));
                    break;
                    case '3': array_push($arrayT3, array_merge($node->fetch(), array("Expiry"=> $timeFissures)));
                    break;
                    case '4': array_push($arrayT4, array_merge($node->fetch(), array("Expiry"=> $timeFissures)));
                    break;
                    case '5': array_push($arrayT5, array_merge($node->fetch(), array("Expiry"=> $timeFissures)));
                    break;
                }
                } else {
                    array_push($notInDB, array("node"=> $newResult['ActiveMissions'][$i]['Node'],"Expiry"=> $timeFissures));
                }
            }
        }
        curl_close($ch);
        $glypher = new Glyph();
        $getglyph = $glypher->GetGlyph();
        require('views/basicsglypher.php');
    }
    //Redirect to about page
    public function aboutPage(){
        require('views/about.php');
    }
    //Owned / not owned glyph
    public function ownedGlyph($id_user){
        $getglyph = new Glyph();
        $getownedglyph = $getglyph->selectowned($id_user);
        require('views/owned.php');
    }
    public function notownedglyph($id_user){
        $glypher = new Glyph();
        $getnotownedglyph = $glypher->selectnotowned($id_user);
        require('views/notowned.php');
    }
    public function addOwnedGlyph($id_user,$id_glyph){
        $getglyph = new Glyph();
        $addownedglyph = $getglyph->postownedglyph($id_user, $id_glyph);
    }
    public function deleteOwnedGlyph($id_user,$id_glyph){
        $getglyph = new Glyph();
        $addownedglyph = $getglyph->deleteGlyph($id_user,$id_glyph);
    }
    //share pages
    public function shareownedGlyph($pseudo){
        $getglyph = new Glyph();
        $getmembers = new Members();
        $get_member = $getmembers->getsignup($pseudo);
        $getownedglyph = $getglyph->selectowned($get_member);
        require('views/ownedsahre.php');
    }
    public function sharenotownedGlyph($pseudo){
        $getglyph = new Glyph();
        $getmembers = new Members();
        $get_member = $getmembers->getsignup($pseudo);
        $getnotownedglyph = $getglyph->selectnotowned($get_member);
        require('views/notownedsahre.php');
    }
    //redirect to submit
    public function submit()
    {
        require('views/submit.php');
    }
    //fonction for add glyph on submit table
    public function addpost($titlePost, $img_submit, $submit_Youtube, $submit_Twitch, $submit_Discord, $submit_Twitter, $submit_Instagram, $submit_Facebook, $submit_Site_1, $submit_Site_2, $desc_submit, $author)
    {
        $newGlyph = new Glyph();
        if (isset($_FILES["img_submit"]) && $_FILES['img_submit']['error'] == 0) {
            $fileInfo = pathinfo($_FILES['img_submit']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['png'];
            if (in_array($extension, $allowedExtensions)) {
                $temp =  explode(".", $_FILES["img_submit"]["name"]);
                $newfilename = $_POST['titlePost'].'.'.end($temp);
                $newdir = 'public\IMG\submit\\';
                $newFileDIR = $newdir . $newfilename;
                $mod = chmod($_FILES["img_submit"]["tmp_name"], 777);
                $mod = $_FILES['img_submit']['tmp_name'];
                if (file_exists($newFileDIR)) {
                    echo "Already exist !";
                    $i = 1;
                    while (file_exists($newdir .$_POST['titlePost'] . '('. $i . ').'. end($temp))) {
                        $i++;
                    }
                    $newfilename = $_POST['titlePost'] . '('. $i . ').'. end($temp);
                    $img_submit = move_uploaded_file($mod, $newdir . $newfilename);
                    $img_submit = $newfilename;
                } else {
                    $img_submit = move_uploaded_file($mod, $newdir . $newfilename);
                    $img_submit = $newfilename;
                }
            } else {
                echo "This is not a PNG image.";
            }
            if(isset($desc_submit)){
                //check if www.warframe.com for glabal promocode create a link
                if(strpos($desc_submit ,"www.warframe.com")){
                    $desc_submit = '<a href="'.$desc_submit. '" class="claim_glyph" target="__blank">Redeem Code</a>';
                }
            }
        } else {
            echo "Return Code: ". $_FILES['img_submit']['error'];
        }
        //add on BDD the submit form
        $addGlyph = $newGlyph -> addGlyph(
            $titlePost,
            $img_submit,
            $submit_Youtube,
            $submit_Twitch,
            $submit_Discord,
            $submit_Twitter,
            $submit_Instagram,
            $submit_Facebook,
            $submit_Site_1,
            $submit_Site_2,
            $desc_submit,
            $author
        );

        if ($addGlyph === false) {
            die(var_dump("Its not possible to add glyph"));
        } else {
            header('Location: index.php');
        }
    }
    public function signup()
    {
        $sign = new Members();
        require('views/signupView.php');
    }
    // function form signup
    public function postsignup()
    {
        $register = new Members();
        if (isset($_POST['inscription'])) {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            extract($_POST);

            if (!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)) {
                //2 input password différent = return false
                if ($password == $cpassword) {
                    $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                    $signup = $register->postsignup($pseudo, $email, $pass_hache);
                } else {
                    echo "Les mots de passe sont différents !";
                }
            }
        }
        //according to the different conditions 2 identical pseudo are returned false
        if ($signup !== false) {
            echo('Impossibilité de s\'inscrire pour l\'instant');
        } else {
            header('Location: index.php');
        }
    }
    // verify for valid pseudo
    public function verifPseudo($pseudo)
    {
        $verifpseudo = new Members();
        if (isset($_POST['inscription'])) {
            $pseudo = $_POST['pseudo'];
            $pseudos = $verifpseudo -> getsignup($pseudo);

            if ($pseudos == 0) {
                echo "Pseudo disponible";
            } else {
                echo('Pseudo non disponible');
            }
        }
    }
    // verif for login form
    public function verifyLogin()
    {
        $verifylogin = new Members();
        if (isset($_POST['signin'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $resultat = $verifylogin -> getlogin();
            // Comparison of the pass sent via the form with the database
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
            if (!$resultat) {
                echo 'Mauvais identifiant !';
            } else {
                if ($isPasswordCorrect) {
                    $_SESSION['id'] = $resultat['user_id'];
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['admin']= $resultat['admin'];
                    header('Location: index.php');
                } else {
                    echo 'Mauvais mot de passe !';
                }
            }
        }
    }
    //view admin page
    public function admin()
    {
        $glypher = new Glyph();
        $getglyph = $glypher->getsubmit();
        require_once('views/admin.php');
    }
    public function valid_submit($id_submit)
    {
        $glypher = new Glyph();
        $get_submit = $glypher->getSubmitModify($id_submit);

        $newfilename = $get_submit['title_submit'] .'.png';
        $parenDIR = 'public\IMG\\';
        $oldDIR = '.\public\IMG\submit\\';
        $oldFileDIR = $oldDIR . $newfilename;
        $newdir = 'public\IMG\IMG-partenaire-warframe\\';
        if (file_exists($oldFileDIR)) {
            if(file_exists($newdir.$newfilename)){
                echo "Already exist !";
                $i = 1;
                while (file_exists($newdir .$get_submit['title_submit'] . '('. $i . ').png')) {
                    $i++;
                }
                $newfilename = $get_submit['title_submit'] . '('. $i . ').png';
                $newFileDIR = $newdir . $newfilename;
                $img_submit = copy($oldFileDIR, $newFileDIR);
                $modPrentDir = chmod($parenDIR,0777);
                $modDir = chmod($oldDIR,0777);
                $mod= chmod($oldFileDIR,0777);
                $img_submit = unlink(realpath($oldFileDIR));
            }else{
                echo("doesn't exist!");
                $newFileDIR = $newdir . $newfilename;
                $img_submit = copy($oldFileDIR, $newFileDIR);
                // unlink
                $modPrentDir = chmod($parenDIR,0777);
                $modDir = chmod($oldDIR,0777);
                $mod= chmod($oldFileDIR,0777);
                $img_submit = unlink(realpath($oldFileDIR));
            }
            $validation_submit = $glypher->addOnGlyph(
                $get_submit['title_submit'],
                $get_submit['img_submit'],
                $get_submit['submit_Youtube'],
                $get_submit['submit_Twitch'],
                $get_submit['submit_Discord'],
                $get_submit['submit_Twitter'],
                $get_submit['submit_Instagram'],
                $get_submit['submit_Facebook'],
                $get_submit['submit_Site_1'],
                $get_submit['submit_Site_2'],
                $get_submit['desc_submit'],
                $get_submit['id_user']
            );
            $suppr_submit = $glypher->supprSubmitGlyph($id_submit);
        }
    }
    //btn delete glyph submit
    function supprSubmitGlypher($id_submit)
    {
        $glypher = new Glyph();
        $supprGlypher = $glypher->supprSubmitGlyph($id_submit);
        header('Location: index.php?action=admin');
    }
    //btn modify submit glyph (redirect view pages)
    function getModSubmit($getModSubmit)
    {
        $glypher= new Glyph();
        $getModGlyph = $glypher->getSubmitModify($getModSubmit);
        require_once('views/modify-admin.php');
    }
    //submit modify form and no change validation
    function modifySubmit($submit_Youtube, $submit_Twitch, $submit_Discord, $submit_Twitter, $submit_Instagram, $submit_Facebook, $submit_Site_1, $submit_Site_2, $desc_submit, $id_submit)
    {
        $glypher = new Glyph();
        $modGlypher = $glypher->modifyGlyph(
             $submit_Youtube,
             $submit_Twitch,
             $submit_Discord,
             $submit_Twitter,
             $submit_Instagram,
             $submit_Facebook,
             $submit_Site_1,
             $submit_Site_2,
             $desc_submit,
             $id_submit
        );
        require_once('views/modify-admin.php');
        if ($modGlypher == false) {
            die(var_dump($modGlypher));
        } else {
            header('Location: index.php?action=admin');
        }
    }
    //function disconnect
    function disconnect()
    {
        session_destroy();
        header('Location: index.php');
    }
    }