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
                case 'submit':
                    $instancecontroller->submit();
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