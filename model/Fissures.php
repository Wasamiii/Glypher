<?php
namespace Wamp\www\model;

use Wamp\www\model\Manager;
require_once('model/Manager.php');

class Fissures extends Manager
{
    
    public function howToGetFissuresTypeMissions(){
        $db = $this->dbConnect();
        $getFissures= $db -> query('SELECT fissures.node, fissures.mission_fissures,mission_type.trad_mission,region.planete 
        FROM fissures 
        INNER JOIN mission_type 
        ON fissures.id_type_mission = mission_type.mission_api 
        INNER JOIN region 
        ON fissures.id_region = region.indexation');
        return $getFissures;
    }
}

?>