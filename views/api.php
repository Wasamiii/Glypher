<?php
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
      //les fissures sont avant GlobalUpgrades
      $posStingEndSyndicate = strpos($result,',"GlobalUpgrades"');
      $substrToPos = substr($result,$posStingStartSyndicate,$posStingEndSyndicate-$posStingStartSyndicate);
      //position de Baro
      $posStingStartBaro = strpos($result,'"VoidTraders"');
      $posStingEndBaro = strpos($result,',"VoidStorms"' );
      $substrToPosBaro = substr($result, $posStingStartBaro,$posStingEndBaro-$posStingStartBaro);
      $newResult = $addBginningResult . $substrToPos .','.$substrToPosBaro. $addEndingResult;
      echo $newResult;
      //echo $substrToPosDelete;
      // $json = print($newResult);
      // echo $json;
    }
    // On ferme curl
    curl_close ($ch);

?>
