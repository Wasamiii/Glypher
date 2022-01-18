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
            submit_Tiwtter,
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
    public function getsubmit(){
        $db=$this->dbConnect();
        $getSubmit = $db -> query(
            'SELECT * 
            FROM submit
            ORDER BY id_submit ASC'
        );
        return $getSubmit;
    }
}
?>