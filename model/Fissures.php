<?php
namespace model;
require_once('Manager.php');
// require '../vendor/autoload.php';
use model\Manager;


class Fissures extends Manager
{
    public function __construct(){

    }
    public function howToGetFissuresTypeMissions(){
        $db = $this->dbConnect();
        $getFissures= $db -> prepare('SELECT fissures.node, fissures.mission_fissures,mission_type.trad_mission,region.planete 
        FROM fissures 
        INNER JOIN mission_type 
        ON fissures.id_type_mission = mission_type.mission_api 
        INNER JOIN region 
        ON fissures.id_region = region.indexation
        ');
        $getFissures -> execute(array());
        return $getFissures;
    }

    public function infosFissures($node){
        $db = $this->dbConnect();
        $infos = $db->prepare('SELECT fissures.node, fissures.mission_fissures,mission_type.trad_mission,region.planete 
        FROM fissures 
        INNER JOIN mission_type 
        ON fissures.id_type_mission = mission_type.mission_api 
        INNER JOIN region 
        ON fissures.id_region = region.indexation
        WHERE fissures.node = ? 
        ');
        $infos-> execute(array($node));
        return $infos;
    }
}

?>