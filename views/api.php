<?php
require '../vendor/autoload.php';
use model\Fissures;
function public_Api(){
  header('Content-Type: application/json',
      'Access-Control-Allow-Origin: *'
);
  $url = "http://content.warframe.com/dynamic/worldState.php";
  $ch = curl_init($url);
  
  // data
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'Content-Type: application/json');
  
  // return result
  $result = curl_exec($ch);
  
  // on error
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }else{
    
    // Add { } for json api
    $addBginningResult = '{';
    $addEndingResult = '}';
    //position syndicate mission
    $posStingStartSyndicate = strpos($result, '"SyndicateMissions');
    $posStingEndSyndicate = strpos($result,',"ActiveMissions"');
    $substrToPosSyndicate = substr($result,$posStingStartSyndicate,$posStingEndSyndicate-$posStingStartSyndicate);
    
    //position fissures 
    $posStringStartActive = strpos($result,'"ActiveMissions');
    $posStringEndActive = strpos($result, '],"GlobalUpgrades"');
    $substrToPosActive = substr($result,$posStringStartActive,$posStringEndActive-$posStringStartActive);
    
    //position Baro
    $posStingStartBaro = strpos($result,'"VoidTraders"');
    $posStingEndBaro = strpos($result,',"VoidStorms"' );
    $substrToPosBaro = substr($result, $posStingStartBaro,$posStingEndBaro-$posStingStartBaro);
    
    
    $newResult = $addBginningResult . $substrToPosSyndicate .','.$substrToPosActive. '],'. $substrToPosBaro . $addEndingResult;
    
    $offset = 0;
    $fissures = new Fissures();
    while (strpos($newResult,'"Node":',$offset)){
      $debutNode = strpos($newResult,'"Node":',$offset) + 8;
      $finNode = strpos($newResult, '"',$debutNode+1);
      $nomNode = substr($newResult,$debutNode,$finNode-$debutNode);
      if(!strpos($nomNode,"HUB")){
       $result = $fissures->infosFissures($nomNode);
       $tabResult = $result->fetch();

      //Planete
      $addplanete = '"planete":"'. $tabResult['planete'] .'",';
      $newResult = substr($newResult,0,$debutNode-8).$addplanete.substr($newResult,$debutNode-8);
      $finNode = $finNode + strlen($addplanete);
      
      // Type of missions
      $addMissions = '"Mission_type":"'.$tabResult['trad_mission'].'",';
      $newResult = substr($newResult,0,$debutNode-8).$addMissions.substr($newResult,$debutNode-8);
      $finNode = $finNode + strlen($addMissions); 
      
      //Name of mission
      $addNameMissions = '"Name_missions":"'. $tabResult['mission_fissures'].'",';
      $newResult = substr($newResult,0,$debutNode-8).$addNameMissions.substr($newResult,$debutNode-8);
      $finNode = $finNode + strlen($addNameMissions);
      
      }
      $offset = $finNode;
    }
    echo $newResult;
  }
  // we close curl
  curl_close ($ch);
}
public_Api();
?>
