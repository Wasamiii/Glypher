<?php
namespace model;
require_once('Manager.php');

use model\Manager;

class Members extends Manager
{
    public function postsignup($pseudo,$email,$pass_hache){
        $db = $this->dbConnect();
        $register = $db->prepare('INSERT INTO users(pseudo, email, password, date) VALUES(:pseudo, :email, :password,  NOW())');
        $register->execute(array(
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $pass_hache));
        echo "Le compte à été créée";
        return $register;      
    }

    public function getsignup($pseudo){
        $db = $this->dbConnect();
        $verifpseudo = $db->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $verifpseudo -> execute(array($pseudo));
        $count = $verifpseudo -> rowCount();
        return $count;
    }

    public function getlogin(){
        $db = $this->dbConnect();
        $pseudo = $_POST['pseudo'];
        $req = $db->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req->execute(['pseudo' => $pseudo]);
        $resultat = $req->fetch();
        return $resultat;
    }
    
    public function getuser_id($user_id){
        $db = $this->dbConnect();
        $getuser_id = $db->prepare('SELECT user_id FROM users WHERE pseudo = ?');
        $getuser_id->execute(array($user_id));
        return $getuser_id;
    }
}

?>