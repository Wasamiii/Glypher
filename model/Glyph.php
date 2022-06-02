<?php
namespace model;
use model\Manager;
require_once('Manager.php');
class Glyph extends Manager
{
    public function __construct()
    {
    }
    public function GetGlyph()
    {
        $db = $this->dbConnect();
        $reqgetglyph = $db -> query(
            'SELECT * 
            FROM glyphs 
            ORDER BY  title ASC'
        );
        return $reqgetglyph;
    }
    public function addGlyph($titlePost, $img_submit, $submit_Youtube, $submit_Twitch, $submit_Discord, $submit_Twitter, $submit_Instagram, $submit_Facebook, $submit_Site_1, $submit_Site_2, $desc_submit, $author)
    {
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
    public function getsubmit()
    {
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
    public function supprSubmitGlyph($id_submit)
    {
        $db = $this->dbConnect();
        $supprglyph = $db->prepare('DELETE FROM `submit` WHERE id_submit = ?');
        $supprglyph->execute(array($id_submit));
        return $supprglyph;
    }
    //Partie modification
    //Trouver comment récupérer l'id_submit
    public function getSubmitModify($getIdSubmit)
    {
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
    public function modifyGlyph($submit_Youtube, $submit_Twitch, $submit_Discord, $submit_Twitter, $submit_Instagram, $submit_Facebook, $submit_Site_1, $submit_Site_2, $desc_submit, $id_submit)
    {
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
    public function validGlyph($id_submit)
    {
        $db = $this->dbConnect();
        $valid_glyph = $db->prepare('UPDATE `submit`
        SET validation = "1"
        WHERE id_submit = ?');
        $valid_glyph->execute(array($id_submit));
        return $valid_glyph;
    }
    public function addOnGlyph($titlePost, $img_submit, $submit_Youtube, $submit_Twitch, $submit_Discord, $submit_Twitter, $submit_Instagram, $submit_Facebook, $submit_Site_1, $submit_Site_2, $desc_submit, $author)
    {
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
    //Join Table glyph and user to glyphowned
    public function getownedGlyph($user_id, $id_glyph)
    {
        $db = $this->dbConnect();
        $ownedglyph = $db->prepare('SELECT * 
        FROM glyphowned 
        INNER JOIN glyphs ON glyphowned.id_glyph = glyphs.id 
        INNER JOIN users ON glyphowned.id_user = users.user_id
        WHERE id_user AND id_glyph');
        $ownedglyph->execute(array($user_id,$id_glyph));
        return $ownedglyph;
    }
    public function selectnotowned($id_user)
    {
        $db = $this->dbConnect();
        $notownedglyph = $db->prepare('SELECT 
        id,
        title,
        img,
        Youtube,
        Twitch,
        Discord,
        Twitter,
        Instagram,
        Facebook,
        Site_1,
        Site_2,
        description,
        version,
        author 
        FROM glyphs 
        WHERE id 
        NOT IN 
        (SELECT id_glyph FROM glyphowned WHERE id_user= ? ) 
        ORDER BY title ASC');
        $notownedglyph->execute(array($id_user));
        return $notownedglyph;
    }
    public function selectowned($id_user){
        $db = $this->dbConnect();
        $ownedglyph = $db->prepare('SELECT
        id,
        title,
        img,
        Youtube,
        Twitch,
        Discord,
        Twitter,
        Instagram,
        Facebook,
        Site_1,
        Site_2,
        description,
        version,
        author
        FROM glyphs
        WHERE id 
        IN
        (SELECT id_glyph FROM glyphowned WHERE id_user= ? )
        ORDER BY title ASC');
        $ownedglyph->execute(array($id_user));
        return $ownedglyph;
    }
    public function postownedglyph($id_user, $id_glyph)
    {
        $db = $this->dbConnect();
        $selectpostglyph = $db->prepare('SELECT title FROM glyphs WHERE id = ? ');
        $selectpostglyph->execute(array($id_glyph));
        $selectpostglyph = $selectpostglyph->fetch();
        var_dump($selectpostglyph);
        $selectidglyph = $db->prepare('SELECT id FROM glyphs WHERE title LIKE ?');
        $selectidglyph->execute(array($selectpostglyph[0]));
        var_dump($selectidglyph);

        while($data = $selectidglyph -> fetch()){
            var_dump($data);
            $postglyphowned = $db->prepare('INSERT INTO glyphowned(id_user,id_glyph) VALUES (?,?)');
            $postglyphowned->execute(array($id_user,$data[0]));
            var_dump("ajout ".$id_user. "et ".$data[0]);
        }
    }
    
    public function deleteGlyph($id_user, $id_glyph)
    {
        $db = $this->dbConnect();
        $selectpostglyph = $db->prepare('SELECT title FROM glyphs WHERE id = ? ');
        $selectpostglyph->execute(array($id_glyph));
        $selectpostglyph = $selectpostglyph->fetch();
        var_dump($selectpostglyph);
        $selectidglyph = $db->prepare('SELECT id FROM glyphs WHERE title LIKE ?');
        $selectidglyph->execute(array($selectpostglyph[0]));
        var_dump($selectidglyph);

        while ($data = $selectidglyph -> fetch()) {
            var_dump($data);
            $updateglyh = $db->prepare('DELETE FROM glyphowned WHERE id_user = ? AND id_glyph = ?');
            $updateglyh->execute(array($id_user,$data[0]));
        }
    }
}
?>