<?php
namespace model;
use model\Manager;

class Glyph extends Manager{
    public function __construct() {

    }
    public function GetGlyph(){
        $db = $this->dbConnect();
        $getglyph = $db -> prepare('SELECT * 
        FROM glyphs 
        ORDER BY  title ASC');
        $getglyph -> execute();
        return $getglyph;
    }
}
?>