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
      $posStingStartSyndicate = strpos($result, '"SyndicateMissions');
      $posStingEndSyndicate = strpos($result,',"GlobalUpgrades"');
      $substrToPos = substr($result,$posStingStartSyndicate,$posStingEndSyndicate-$posStingStartSyndicate);
      $newResult = $addBginningResult . $substrToPos . $addEndingResult;
      echo $newResult;
      //echo $substrToPosDelete;
      // $json = print($newResult);
      // echo $json;
    }
    // On ferme curl
    curl_close ($ch);

?>
