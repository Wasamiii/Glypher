<?php
namespace model;
use model\Manager;
require_once('Manager.php');
class Glyph extends Manager{
    public function __construct() {

    }
    public function GetGlyph(){
        $db = $this->dbConnect();
        $reqgetglyph = $db -> query('SELECT * 
        FROM glyphs 
        ORDER BY  title ASC');
        //$reqgetglyph -> execute(array());
        //$getglyph = $reqgetglyph->fetchAll();
        return $reqgetglyph;
    }
}
?>