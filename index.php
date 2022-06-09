<?php
session_start();
require('controller/Controller.php');
// var_dump(require 'vendor/autoload.php');
use controller\Controller;
//chercher à faire les choses en POO
class Index extends Controller{
    public function __construct() {
        $instancecontroller = new Controller();
        try{
            if(isset($_GET['action'])){
                $callAction =$_GET['action'];
            }else{
                $callAction = "";
            }
            switch($callAction){
                //affichage de base
                case'basicglyphers':
                    $instancecontroller->basicglypher();
                break;
                //Redirige vers inscription
                case 'members':
                    $instancecontroller->signup();
                break;
                //Connexion
                case 'validSignup':
                    $pseudo = $_POST['pseudo'];
                    $instancecontroller->verifPseudo($pseudo);
                    $instancecontroller->postsignup();
                break;
                case'getlog':
                    $instancecontroller->verifyLogin();
                break;
                case'disconnect':
                    $instancecontroller->disconnect();
                break;
                case 'about':
                    $instancecontroller->aboutPage();
                break;
                case 'owned':
                    $id_user = $_SESSION['id'];

                    $id_glyph='';
                    $instancecontroller->ownedGlyph($id_user);
                    if($_POST['idglyph']){
                        $instancecontroller->deleteOwnedGlyph(
                            $_POST['sessid'],
                            $_POST['idglyph']);
                    }
                break;
                case 'notowned':
                    $id_user = $_SESSION['id'];
                   
                    $id_glyph='';
                    $instancecontroller->notownedglyph($id_user);
                    if($_POST['idglyph']){
                        $instancecontroller->addOwnedGlyph(
                            $_POST['sessid'],
                            $_POST['idglyph']);
                    }
                break;
                case 'shareowned':
                    //récupérer l'id via la BDD
                    $username = $_GET['user'];
                    $instancecontroller->shareownedGlyph($username);
                break;
                case 'sharenotowned':
                    //récupérer l'id via la BDD
                    $username = $_GET['user'];
                    $instancecontroller->sharenotownedGlyph($username);
                break;
                case 'submit': 
                    $instancecontroller->submit();
                break;
                case 'addpost':
                    if(!empty($_POST['titlePost']) && !empty($_POST['desc_submit'])){
                        $instancecontroller->addpost(
                            $_POST['titlePost'],
                            $_FILES['img_submit'],
                            $_POST['submit_Youtube'],
                            $_POST['submit_Twitch'],
                            $_POST['submit_Discord'],
                            $_POST['submit_Twitter'],
                            $_POST['submit_Instagram'],
                            $_POST['submit_Facebook'],
                            $_POST['submit_Site_1'],
                            $_POST['submit_Site_2'],
                            $_POST['desc_submit'],
                            $_SESSION['id']
                        );
                    }else{
                        die(var_dump('not valid'));
                    }
                break;
                case 'admin':
                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == "1"){
                        $instancecontroller->admin();
                    }else{
                        header("Location: index.php");
                    }
                break;
                case 'validation':
                    $id_submit = $_GET['id_submit'];
                    //les parametres ne vont pas undefined variables
                    $instancecontroller->valid_submit($id_submit);
                break;
                case'supprSubmit':
                    $id_submit = $_GET['id_submit'];
                    $instancecontroller->supprSubmitGlypher($id_submit);
                break;
                //Trouver comment récupérer l'id_submit
                case 'getModifySubmit':
                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == "1"){
                        $getModGlypher = $_GET['id_submit'];
                      $instancecontroller->getModSubmit($getModGlypher);
                    }else{
                        header("Location: index.php");
                    }
                break;
                case 'modifySubmit':
                    $getModGlyph = $_GET['id_submit'];
                    die($instancecontroller->modifySubmit(
                        //définir les différents noms
                        $_POST['modify_Youtube'],
                        $_POST['modify_Twitch'],
                        $_POST['modify_Discord'],
                        $_POST['modify_Twitter'],
                        $_POST['modify_Instagram'],
                        $_POST['modify_Facebook'],
                        $_POST['modify_Site_1'],
                        $_POST['modify_Site_2'],
                        $_POST['desc_modify'],
                        $getModGlyph));
                break;
        
                //Affiche la liste de base non membre connecté
                default:
                $instancecontroller->basicglypher();
                break;
            }
        }
        catch (Exception $e){
            echo "Error:" . $e->getMessage();
        }
    }
}
$instanceIndex = new Index();