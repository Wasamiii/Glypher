<?php
// require '../vendor/autoload.php';
require_once('../model/Fissures.php');
use model\Fissures;
function public_Api(){
  // $Fissures = new Fissures();
  header('Content-Type: application/json',
      'Access-Control-Allow-Origin: *'
);
  $url = "http://content.warframe.com/dynamic/worldState.php";
  $ch = curl_init($url);
  
  // Tes données à envoyer
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'Content-Type: application/json');
  
  // Résultat retourné
  $result = curl_exec($ch);
  
  // En cas d'erreur
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }else{
    
    // Afficher le résultat du serveur
    $addBginningResult = '{';
    $addEndingResult = '}';
    //position de syndicate mission
    $posStingStartSyndicate = strpos($result, '"SyndicateMissions');
    $posStingEndSyndicate = strpos($result,',"ActiveMissions"');
    $substrToPosSyndicate = substr($result,$posStingStartSyndicate,$posStingEndSyndicate-$posStingStartSyndicate);
    
    //position à la fin de chaque fissures
    // $posStringStartIntegFissures = strpos($result,'"ActiveMissions');
    // $posStringEndIntegFissures = strpos($result,'},{"',0);
    // $substrToPosAddInfoFissures = substr($result,$posStringStartIntegFissures,$posStringEndIntegFissures-$posStringStartIntegFissures);
    // $testResult = $addBginningResult . $substrToPosAddInfoFissures .',"Ceci est un test"'. $addEndingResult;
    
    //position des fissures 
    $posStringStartActive = strpos($result,'"ActiveMissions');
    $posStringEndActive = strpos($result, '],"GlobalUpgrades"');
    $substrToPosActive = substr($result,$posStringStartActive,$posStringEndActive-$posStringStartActive);
    
    //position de Baro
    $posStingStartBaro = strpos($result,'"VoidTraders"');
    $posStingEndBaro = strpos($result,',"VoidStorms"' );
    $substrToPosBaro = substr($result, $posStingStartBaro,$posStingEndBaro-$posStingStartBaro);
    //! ne pas oublier de supprimer ce qu'il y à ci-dessous + '],' à changer en ',' et supprimer l'autre
    $fissuresTest = '{"_id":{"$oid":"614c6101c6da6fe6117d91"},"Region":19,"Seed":76520,"Activation":{"$date":{"$numberLong":"1632395521629"}},"Expiry":{"$date":{"$numberLong":"'.((time()*1000)+ 60000).'"}},"Node":"SolNode999","MissionType":"MT_INTEL","Modifier":"VoidT5"}';
    $newResult = $addBginningResult . $substrToPosSyndicate .','.$substrToPosActive. ',' . $fissuresTest .'],'. $substrToPosBaro . $addEndingResult;
    
    //echo $testResult;
    //echo $substrToPosDelete;
    $offset = 0;
    $fissures = new Fissures();
    while (strpos($newResult,'"Node":',$offset)){
      $debutNode = strpos($newResult,'"Node":',$offset) + 8;
      $finNode = strpos($newResult, '"',$debutNode+1);
      $nomNode = substr($newResult,$debutNode,$finNode-$debutNode);
      if(!strpos($nomNode,"HUB")){
        // echo $nomNode ."<br/>";
       $result = $fissures->infosFissures($nomNode);
       $tabResult = $result->fetch();
      //  echo $tabResult['planete'];
      //  var_dump($result->fetch());

      //Planete
      $addplanete = '"planete":"'. $tabResult['planete'] .'",';
      $newResult = substr($newResult,0,$debutNode-8).$addplanete.substr($newResult,$debutNode-8);
      $finNode = $finNode + strlen($addplanete);
      
      // Type de missions
      $addMissions = '"Mission_type":"'.$tabResult['trad_mission'].'",';
      $newResult = substr($newResult,0,$debutNode-8).$addMissions.substr($newResult,$debutNode-8);
      $finNode = $finNode + strlen($addMissions); 
      
      //Nom de mission
      $addNameMissions = '"Name_missions":"'. $tabResult['mission_fissures'].'",';
      $newResult = substr($newResult,0,$debutNode-8).$addNameMissions.substr($newResult,$debutNode-8);
      $finNode = $finNode + strlen($addNameMissions);
      
      }
      $offset = $finNode;
    }
    echo $newResult;
  }
  // On ferme curl
  curl_close ($ch);
}
public_Api();
?>
