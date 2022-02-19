<?php
namespace model;
use model\Manager;
require_once('Manager.php');
class Glyph extends Manager{
    public function __construct() {

    }
    public function GetGlyph(){
        $db = $this->dbConnect();
        $reqgetglyph = $db -> query(
            'SELECT * 
            FROM glyphs 
            ORDER BY  title ASC'
        );
        //$reqgetglyph -> execute(array());
        //$getglyph = $reqgetglyph->fetchAll();
        return $reqgetglyph;
    }
    public function addGlyph($titlePost,$img_submit,$submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Twitter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$author){
        $db=$this->dbConnect();
        $adderGlyph = $db->prepare('INSERT INTO submit
        (
            title_submit,
            img_submit,
            submit_Youtube,
            submit_Twitch,
            submit_Discord,
            submit_Twitter,
            submit_Instagram,
            submit_Facebook,
            submit_Site_1,
            submit_Site_2,
            desc_submit,
            date,
            validation,
            id_user
        ) 
        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  NOW(), 0, ? )');
        $adderGlyph->execute(array($titlePost,$img_submit,$submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Twitter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$author));
        var_dump($adderGlyph);
        return $adderGlyph;
    }
    //! ajouter un WHERE title des glyphes avec LIKE pour la barre de recherche
    public function getsubmit(){
        $db=$this->dbConnect();
        $getSubmit = $db -> query(
            'SELECT * 
            FROM submit
            ORDER BY id_submit ASC
            '
        );
        // $getSubmit->fetch();
        return $getSubmit;
    }
    //suppr submit
    public function supprSubmitGlyph($id_submit){
        $db = $this->dbConnect();
        $supprglyph = $db->prepare('DELETE FROM `submit` WHERE id_submit = ?');
        $supprglyph->execute(array($id_submit));
        return $supprglyph;
    }
    //Partie modification
    //Trouver comment récupérer l'id_submit
    public function getSubmitModify($getIdSubmit){
        $db= $this->dbConnect();
        $getSubmit = $db->prepare('SELECT
        id_submit,
        title_submit,
        img_submit,
        submit_Youtube,
        submit_Twitch,
        submit_Discord,
        submit_Twitter,
        submit_Instagram,
        submit_Facebook,
        submit_Site_1,
        submit_Site_2,
        desc_submit,
        date,
        validation,
        id_user
        FROM submit
        WHERE id_submit = ?');
        $getSubmit->execute(array($getIdSubmit));
        $getSubmitMod = $getSubmit->fetch();
        return $getSubmitMod;
    }
    public function modifyGlyph($submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Twitter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$id_submit){
        $db = $this->dbConnect();
        $modGlyph = $db->prepare('UPDATE `submit` 
        SET submit_Youtube= ?,
            submit_Twitch = ?,
            submit_Discord = ?,
            submit_Twitter = ?,
            submit_Instagram = ?,
            submit_Facebook = ?,
            submit_Site_1 = ?,
            submit_Site_2 = ?,
            desc_submit = ?,  
            date = NOW(),
            validation = "0"
            WHERE id_submit = ?');
        $modGlyph->execute(array($submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Twitter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$id_submit));
        return $modGlyph;
    }
    //Validation
    public function validGlyph($id_submit){
        $db = $this->dbConnect();
        $valid_glyph = $db->prepare('UPDATE `submit`
        SET validation = "1"
        WHERE id_submit = ?');
        $valid_glyph->execute(array($id_submit));
        return $valid_glyph;
    }
    public function addOnGlyph($titlePost,$img_submit,$submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Twitter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$author){
        $db = $this->dbConnect();
        $adderonGlyph = $db->prepare('INSERT INTO `glyphs`(
            `title`,
            `img`,
            `Youtube`,
            `Twitch`,
            `Discord`,
            `Twitter`,
            `Instagram`,
            `Facebook`,
            `Site_1`,
            `Site_2`,
            `description`,
            `version`,
            `author`)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),?)');
        $adderonGlyph->execute(array($titlePost,$img_submit,$submit_Youtube,$submit_Twitch,$submit_Discord,$submit_Twitter,$submit_Instagram,$submit_Facebook,$submit_Site_1,$submit_Site_2,$desc_submit,$author));
        return $adderonGlyph;
    }
    //! à améliorer pour la search bar (au niveau du like)
    public function searchSelect($titleSearch){
        $db = $this->dbConnect();
        $selectOnSearch = $db->prepare('SELECT * 
        FROM `glyphs` 
        WHERE `title` 
        LIKE %');
        $selectOnSearch->execute(array($titleSearch));
        return $selectOnSearch;
    }
}
?>